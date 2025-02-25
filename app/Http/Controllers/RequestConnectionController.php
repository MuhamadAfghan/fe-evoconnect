<?php

namespace App\Http\Controllers;

use App\Models\RequestConnection;
use App\Models\MasterConnection;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RequestConnectionController extends Controller
{
    public function getRequests()
    {
        $invitations = RequestConnection::with('fromUser')
            ->where('to_user_id', auth()->id())
            ->where('status', 'pending')
            ->get();

        return response()->json([
            'requests' => $invitations->map(function ($invitation) {
                return [
                    'id' => $invitation->id,
                    'sender_name' => $invitation->fromUser->name,
                    'sender_profile_image' => $invitation->fromUser->getProfileImage(),
                    'created_at' => $invitation->created_at->diffForHumans()
                ];
            })
        ]);
    }

    public function sendConnection(User $user)
    {
        try {
            // Check if connection already exists and is accepted
            $existingAcceptedConnection = RequestConnection::where(function ($query) use ($user) {
                $query->where('from_user_id', auth()->id())
                    ->where('to_user_id', $user->id)
                    ->where('status', 'accepted');
            })->orWhere(function ($query) use ($user) {
                $query->where('from_user_id', $user->id)
                    ->where('to_user_id', auth()->id())
                    ->where('status', 'accepted');
            })->first();

            if ($existingAcceptedConnection) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You are already connected with this user.'
                ], 400);
            }

            // Check if there is a pending request
            $existingPendingRequest = RequestConnection::where(function ($query) use ($user) {
                $query->where('from_user_id', auth()->id())
                    ->where('to_user_id', $user->id);
            })->orWhere(function ($query) use ($user) {
                $query->where('from_user_id', $user->id)
                    ->where('to_user_id', auth()->id());
            })->where('status', 'pending')->first();

            if ($existingPendingRequest) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Connection request already exists'
                ], 400);
            }

            // Create new connection request
            $request = RequestConnection::create([
                'from_user_id' => auth()->id(),
                'to_user_id' => $user->id,
                'status' => 'pending'
            ]);

            // Create notification
            Notification::create([
                'user_id' => $user->id,
                'message' => auth()->user()->name . ' sent you a connection request.',
                'type' => 'connection_request',
                'data' => json_encode([
                    'request_id' => $request->id,
                    'sender_id' => auth()->id(),
                    'sender_name' => auth()->user()->name
                ])
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Connection request sent successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send connection request'
            ], 500);
        }
    }

    public function acceptConnection($id)
    {
        try {
            DB::beginTransaction();

            $request = RequestConnection::findOrFail($id);

            if ($request->to_user_id !== auth()->id()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized action'
                ], 403);
            }

            // Update request status
            $request->update(['status' => 'accepted']);

            // Create master connection
            MasterConnection::create([
                'to_user_id' => $request->to_user_id,
                'from_user_id' => $request->from_user_id,
                'request_id' => $request->id,
                'connected_at' => now(),
                'status' => 'active'
            ]);

            // Create notification
            Notification::create([
                'user_id' => $request->from_user_id,
                'message' => auth()->user()->name . ' accepted your connection request.',
                'type' => 'connection_accepted',
                'data' => json_encode([
                    'accepter_id' => auth()->id(),
                    'accepter_name' => auth()->user()->name
                ])
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Connection request accepted',
                'user_id' => $request->from_user_id
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error accepting connection: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to accept connection request'
            ], 500);
        }
    }

    public function rejectConnection($id)
    {
        try {
            $request = RequestConnection::findOrFail($id);

            if ($request->to_user_id !== auth()->id()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized action'
                ], 403);
            }

            $request->update(['status' => 'rejected']);

            // Optional: Create notification for the sender
            Notification::create([
                'user_id' => $request->from_user_id,
                'message' => 'Your connection request was not accepted.',
                'type' => 'connection_rejected'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Connection request rejected'
            ]);
        } catch (\Exception $e) {
            Log::error('Error rejecting connection: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to reject connection request'
            ], 500);
        }
    }
}
