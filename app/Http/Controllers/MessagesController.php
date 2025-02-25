<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MasterConnection;
use App\Models\Connection;
use Spatie\FlareClient\Api;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        // Ambil daftar koneksi user yang sedang login
        $sentFriends = auth()->user()->connections->map(function ($connection) {
            return $connection->toUser;
        });

        $receivedFriends = auth()->user()->receivedConnections->map(function ($connection) {
            return $connection->fromUser;
        });

        // Gabungkan kedua daftar koneksi
        $connections = $sentFriends->merge($receivedFriends);

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
        // Urutkan koneksi berdasarkan waktu pesan terbaru
        $connections = $connections->sortByDesc(fn($connection) => $connection->latest_message_time)->values();

        return view('connections.messages', compact('connections'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'to_user_id' => 'required',
            'content' => 'required',
        ]);

        $data['from_user_id'] = auth()->id();

        Messages::create($data);

        return ApiFormatter::sendResponse('success', 201, 'Message sent successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
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




        return view('connections.messages', compact('messages', 'connections', 'room_chat', 'spesific_messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Messages $messages)
    {
        //
    }

    public function getConnections()
    {
        $userId = auth()->id();



        // Ambil semua koneksi user yang sudah berteman
        $connections = Connection::where('from_user_id', $userId)
            ->orWhere('to_user_id', $userId)
            ->with(['fromUser', 'toUser'])
            ->get();

        return view('connections.index', compact('connections'));
    }
}
