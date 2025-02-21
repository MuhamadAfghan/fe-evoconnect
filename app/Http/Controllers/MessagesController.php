<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MasterConnection;
use App\Models\Connection;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        // $connections = MasterConnection::where(function ($query) use ($userId) {
        //     $query->where('from_user_id', $userId)
        //         ->orWhere('to_user_id', $userId);
        // })
        //     ->where('status', 'accepted')
        //     ->with(['fromUser', 'toUser'])
        //     ->get()
        //     ->map(function ($connection) use ($userId) {
        //         // Tentukan siapa "teman" dalam koneksi ini
        //         if ($connection->from_user_id == $userId) {
        //             $connection->partner = $connection->toUser;
        //         } else {
        //             $connection->partner = $connection->fromUser;
        //         }

        //         // Tambahkan nama teman ke dalam koneksi
        //         $connection->partner_name = $connection->partner->name;

        //         return $connection;
        //     });

        $sentFriends = auth()->user()->connections->map(function ($connection) {
            return $connection->toUser;
        });

        $receivedFriends = auth()->user()->receivedConnections->map(function ($connection) {
            return $connection->fromUser;
        });

        $connections = $sentFriends->merge($receivedFriends);

        // return $connections;


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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Messages $messages)
    {
        //
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
