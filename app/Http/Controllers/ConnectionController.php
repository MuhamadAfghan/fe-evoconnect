<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\GroupConnection;
use App\Models\User;
use Illuminate\Http\Request;


class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['connections', 'receivedConnections'])
            ->where('id', '!=', auth()->id())
            ->where('username', '!=', null)
            ->get();

        $notifications = auth()->user()->notifications;

        $groups = GroupConnection::all();

        return view('connections.index', compact('users', 'notifications', 'groups'));
    }

    /**
     *
     *
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

    public function edit(Connection $connection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Connection $connection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Connection $connection)
    {
        //
    }
}
