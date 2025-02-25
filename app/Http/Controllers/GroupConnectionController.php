<?php

namespace App\Http\Controllers;

use App\Models\GroupMember;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GroupConnection;

class GroupConnectionController extends Controller
{
    // Menampilkan daftar grup
    public function index()
    {
        $groups = GroupConnection::latest()->get();
        return view('groups.index', compact('groups'));
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
            'group_connection_id' => $group->id, // Perbaikan dari $request->input('group_connection_id')
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
        $isAdmin = $user ? $group->isAdmin($user->id) : false;
        $admins = $group->admins();

        return view('groups.show', compact('group', 'user', 'isAdmin', 'admins'));
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
            $group->members()->detach(auth()->id());
            return response()->json(['message' => 'Berhasil keluar dari grup'], 200);
        }
        return response()->json(['message' => 'Anda belum bergabung di grup ini'], 400);
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
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }
}
