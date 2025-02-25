<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Events\ChatEvent;
use App\Models\Chat;
use App\Models\Messages;
use App\Models\User;

class ChatController extends Controller
{
    public function room($room)
    {
        $userId = auth()->user()->id;

        $sentFriends = auth()->user()->connections->map(function ($connection) {
            return $connection->toUser;
        });

        $receivedFriends = auth()->user()->receivedConnections->map(function ($connection) {
            return $connection->fromUser;
        });

        // Merge connections
        $connections = $sentFriends->merge($receivedFriends);

        // Get messages first
        $messages = Messages::where(function ($query) use ($userId, $connections) {
            $query->where(function ($q) use ($userId, $connections) {
                $q->where('from_user_id', $userId)->whereIn('to_user_id', $connections->pluck('id'));
            })->orWhere(function ($q) use ($userId, $connections) {
                $q->whereIn('from_user_id', $connections->pluck('id'))->where('to_user_id', $userId);
            });
        })->latest()->get();

        $connections = $connections->sortByDesc(function ($connection) use ($messages) {
            $latestMessage = $messages->first(function ($message) use ($connection) {
                return $message->from_user_id == $connection->id || $message->to_user_id == $connection->id;
            });
            return $latestMessage ? $latestMessage->created_at : null;
        })->values();
        // Ambil semua pesan yang melibatkan user yang sedang login
        $messages = Messages::where(function ($query) use ($userId, $connections) {
            $query->where(function ($q) use ($userId, $connections) {
                $q->where('from_user_id', $userId)->whereIn('to_user_id', $connections->pluck('id'));
            })->orWhere(function ($q) use ($userId, $connections) {
                $q->whereIn('from_user_id', $connections->pluck('id'))->where('to_user_id', $userId);
            });
        })
            ->latest()
            ->get();

        // Tambahkan pesan terbaru ke dalam setiap koneksi
        $connections = $connections->map(function ($connection) use ($userId, $messages) {
            $latestMessage = $messages->first(function ($message) use ($connection, $userId) {
                return ($message->from_user_id == $connection->id && $message->to_user_id == $userId) ||
                    ($message->from_user_id == $userId && $message->to_user_id == $connection->id);
            });

            // Tambahkan pesan terbaru ke dalam object connection
            $connection->latest_message = $latestMessage ? $latestMessage->content : 'No messages yet';
            $connection->latest_message_time = $latestMessage ? $latestMessage->created_at->format('h:i A') : null;
            $connection->fromMe = $latestMessage ? $latestMessage->from_user_id == $userId : false;

            return $connection;
        });
        // Get room
        $room = DB::table('chat_rooms')->where('id', $room)->first();

        // Get users
        $users = DB::table('chat_room_users')->where('chat_room_id', $room->id)->get();

        // Get user id
        $user_id = $users->first(function ($user) use ($userId) {
            return $user->user_id != $userId;
        })->user_id;

        // Urutkan koneksi berdasarkan waktu pesan terbaru
        $spesific_messages = Messages::where(function ($query) use ($user_id, $userId) {
            $query->where('from_user_id', $user_id)
                ->where('to_user_id', $userId)
                ->orWhere(function ($q) use ($user_id, $userId) {
                    $q->where('from_user_id', $userId)
                        ->where('to_user_id', $user_id);
                });
        })
            ->with(['fromUser', 'toUser'])
            ->get();


        $room_chat = User::find($user_id);


        return view('connections.messages', compact('room', 'users', 'spesific_messages', 'room_chat', 'connections'));
    }

    public function getChat($room)
    {
        $chats = Chat::with('user')
            ->where('chat_room_id', $room)
            ->get()
            ->map(function ($chat) {
                return [
                    'id' => $chat->id,
                    'chat_room_id' => $chat->chat_room_id,
                    'user_id' => $chat->user_id,
                    'message' => $chat->message,
                    'created_at' => $chat->created_at,
                    'updated_at' => $chat->updated_at,
                    'user_name' => $chat->user->name,
                    'user_photo' => $chat->user->profile_photo_url
                ];
            });

        return response()->json($chats);
    }

    // Send chat
    public function sendChat(Request $request)
    {
        $chat = DB::table('chats')->insert([
            'chat_room_id' => $request->room,
            'user_id' => auth()->user()->id,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $receiver = DB::table('chat_room_users')
            ->where('chat_room_id', $request->room)
            ->where('user_id', '!=', auth()->user()->id)
            ->first();

        // Trigger event
        broadcast(new ChatEvent($request->room, $request->message, auth()->user()->id, $receiver->user_id));
        // broadcast(new ChatEvent($request->room, $request->message, auth()->user()->id));

        return response()->json($chat);
    }

    public function chat($user)
    {
        $my_id = auth()->user()->id;
        $target_id = $user;

        $my_room = DB::table('chat_room_users');
        $target_room = clone $my_room;

        // Get my room
        $my_room = $my_room->where('user_id', $my_id)->get()->keyBy('chat_room_id')->toArray();
        // Get target room
        $target_room = $target_room->where('user_id', $target_id)->get()->keyBy('chat_room_id')->toArray();

        // Check room
        $room = array_intersect_key($my_room, $target_room);

        // If room exists
        if ($room) return redirect()->route('messages.room', ['room' => array_keys($room)[0]]);

        // If room doesn't exist
        $uuid = Str::orderedUuid();
        $room = DB::table('chat_rooms')->insert([
            'id' => $uuid,
            'name' => 'generate by system',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Add users to room
        DB::table('chat_room_users')->insert([
            [
                'id' => Str::orderedUuid(), // Add this line to generate a unique ID
                'chat_room_id' => $uuid,
                'user_id' => $my_id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Str::orderedUuid(), // Add this line to generate a unique ID
                'chat_room_id' => $uuid,
                'user_id' => $target_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        return redirect()->route('messages.room', ['room' => $uuid]);
    }
}
