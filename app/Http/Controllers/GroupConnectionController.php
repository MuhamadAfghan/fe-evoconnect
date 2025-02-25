<?php

namespace App\Http\Controllers;

use App\Models\GroupMember;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GroupConnection;
use App\Models\User;
use App\Models\Connection;

class GroupConnectionController extends Controller
{
    public function index()
    {
        // Get all groups
        $groups = GroupConnection::latest()->get();

        // Get groups where user is a member (for distinguishing joined vs. not joined)
        $userGroups = [];
        if (auth()->check()) {
            $userGroups = auth()->user()->groupConnections()->pluck('group_connection_id')->toArray();
        }


        $hasJoidedGroups = auth()->user()->groupConnections()->get();

        // Filter groups that the user has not joined
        $suggestedGroups = $groups->reject(function ($group) use ($userGroups) {
            return in_array($group->id, $userGroups);
        });

        $user = auth()->user();
        $pendingInvitations = GroupMember::where('user_id', $user->id)
            ->where('status', 'pending')
            ->with('groupConnection')
            ->get();



        return view('groups.index', compact('groups', 'userGroups', 'suggestedGroups', 'hasJoidedGroups', 'pendingInvitations'));
    }

    // Menyimpan grup baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Create group
        $group = new GroupConnection();
        $group->id = Str::uuid();
        $group->name = $request->name;
        $group->description = $request->description;

        if ($request->hasFile('image')) {
            $group->image = $request->file('image')->store('group-images', 'public');
        }

        $group->save();

        // Add creator as admin
        $groupMember = new GroupMember([
            'user_id' => auth()->user()->id,
            'group_connection_id' => $group->id,
            'role' => 'admin', // Admin karena dia pembuat grup
        ]);

        $groupMember->save();

        return redirect()->route('groups.index')->with('success', 'Group created successfully');
    }

    // Menampilkan profil grup
    public function show($id)
    {
        $group = GroupConnection::with(['members.user'])->findOrFail($id);
        $user = auth()->user();
        $isMember = false;
        $isAdmin = false;

        if ($user) {
            $isMember = $group->members()->where('user_id', $user->id)->exists();
            $isAdmin = $group->isAdmin($user->id);
        }

        // Get all the user's connections from master_connections table
        $connections = $user->connections()->with('user')->get();

        $admins = $group->admins();

        return view('groups.show', compact('group', 'user', 'isAdmin', 'admins', 'isMember', 'connections'));
    }

    public function members($id)
    {
        $group = GroupConnection::with(['members.user'])->findOrFail($id);

        // Check if user is admin
        if (!$group->isAdmin(auth()->id())) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }

        return view('groups.members', compact('group'));
    }

    public function removeMember($groupId, $memberId)
    {
        $group = GroupConnection::findOrFail($groupId);

        // Check if user is admin
        if (!$group->isAdmin(auth()->id())) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }

        // Cannot remove yourself as admin
        $member = GroupMember::findOrFail($memberId);
        if ($member->user_id == auth()->id() && $member->role == 'admin') {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus diri sendiri sebagai admin');
        }

        $member->delete();

        return redirect()->back()->with('success', 'Anggota berhasil dihapus');
    }

    public function changeMemberRole($groupId, $memberId, Request $request)
    {
        $group = GroupConnection::findOrFail($groupId);

        // Check if user is admin
        if (!$group->isAdmin(auth()->id())) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses');
        }

        $member = GroupMember::findOrFail($memberId);
        $member->role = $request->role; // 'admin' atau 'member'
        $member->save();

        return redirect()->back()->with('success', 'Role anggota berhasil diubah');
    }

    public function join(GroupConnection $group)
    {
        $userId = auth()->id();

        // Cek apakah user sudah menjadi anggota
        if (!$group->members()->where('user_id', $userId)->exists()) {
            $group->members()->create([
                'user_id' => $userId,
                'role' => 'member', // Default role 'member'
            ]);

            return response()->json(['message' => 'Berhasil bergabung ke grup'], 200);
        }

        return response()->json(['message' => 'Anda sudah bergabung di grup ini'], 400);
    }

    public function leave(GroupConnection $group)
    {
        if ($group->members()->where('user_id', auth()->id())->exists()) {
            $group->members()->where('user_id', auth()->id())->delete();

            return response()->json([
                'message' => 'Berhasil keluar dari grup',
                'groupId' => $group->id,
                'redirectTo' => route('groups.index')
            ], 200);
        }
        return response()->json(['message' => 'Anda belum bergabung di grup ini'], 400);
    }

    public function invite(Request $request)
    {
        $group = GroupConnection::findOrFail($request->group_id);
        $user = User::findOrFail($request->user_id);

        // Cek apakah user sudah jadi anggota
        if ($group->members()->where('user_id', $user->id)->exists()) {
            return response()->json(['message' => 'User is already a member.'], 400);
        }

        // Tambahkan ke anggota grup dengan status pending
        $group->members()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);


        return response()->json(['message' => 'User invited successfully.']);
    }

    public function acceptInvitation(Request $request)
    {
        $invitation = GroupMember::findOrFail($request->invitation_id);
        $invitation->status = 'accepted';
        $invitation->save();

        return response()->json(['message' => 'Invitation accepted successfully.']);
    }

    public function rejectInvitation(Request $request)
    {
        $invitation = GroupMember::findOrFail($request->invitation_id);
        $invitation->status = 'rejected';
        $invitation->save();

        return response()->json(['message' => 'Invitation rejected successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function edit(GroupConnection $groupConnection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GroupConnection $groupConnection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupConnection $group)
    {
        if (!$group->isAdmin(auth()->id())) {
            return redirect()->route('groups.index')->with('error', 'Anda tidak memiliki izin untuk menghapus grup.');
        }

        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }
}
