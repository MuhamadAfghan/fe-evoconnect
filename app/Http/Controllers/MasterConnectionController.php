<?php

namespace App\Http\Controllers;

use App\Models\MasterConnection;
use Illuminate\Http\Request;

class MasterConnectionController extends Controller
{
    public function index()
    {
        $connections = MasterConnection::with(['fromUser', 'toUser'])
            ->where('to_user_id', auth()->id())
            ->orWhere('from_user_id', auth()->id())
            ->get();

        return view('connections.list_connection', compact('connections'));
    }
}
