<?php

namespace App\Http\Controllers;

use App\Models\RequestConnection;
use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use App\Models\User;
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
            \Log::error('Error sending connection request: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send connection request'
            ], 500);
        }
    }

    public function acceptConnection($id)
    {
        $request = RequestConnection::findOrFail($id);

        // Verify the request is for the authenticated user
        if ($request->to_user_id !== auth()->id()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized action'
            ], 403);
        }

        $request->update(['status' => 'accepted']);

        // Create notification for the sender
        Notification::create([
            'user_id' => $request->from_user_id,
            'message' => auth()->user()->name . ' accepted your connection request.',
            'type' => 'connection_accepted',
            'data' => json_encode([
                'accepter_id' => auth()->id(),
                'accepter_name' => auth()->user()->name
            ])
        ]);

        return response()->json(['message' => 'Connection request accepted']);
    }

    public function rejectConnection($id)
    {
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
    }
}
