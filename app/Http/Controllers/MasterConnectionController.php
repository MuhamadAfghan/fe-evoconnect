<?php

namespace App\Http\Controllers;

use App\Models\MasterConnection;
use App\Models\RequestConnection;
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

    public function disconnect($id)
    {
        $connection = MasterConnection::findOrFail($id);

        // Pastikan hanya user terkait yang bisa menghapus koneksi
        if ($connection->from_user_id == auth()->id() || $connection->to_user_id == auth()->id()) {
            // Hapus koneksi dari MasterConnection
            $connection->delete();

            // Update status koneksi di RequestConnection menjadi 'rejected'
            RequestConnection::where('from_user_id', $connection->from_user_id)
                ->where('to_user_id', $connection->to_user_id)
                ->orWhere('from_user_id', $connection->to_user_id)
                ->where('to_user_id', $connection->from_user_id)
                ->update(['status' => 'rejected']);

            return redirect()->back()->with('success', 'You have disconnected successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }
}
