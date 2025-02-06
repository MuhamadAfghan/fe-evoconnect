<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Hapus foto lama jika ada
        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
        }

        // Simpan foto baru
        $path = $request->file('profile_photo')->store('profile-photos', 'public');
        $user->profile_photo_path = $path;
        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diupdate.');
    }

    public function deletePhoto(Request $request)
    {
        $user = Auth::user();

        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'location' => 'nullable|string|max:255',
            'organization' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'phone_number' => 'nullable|string|max:255',
            'preferred_language' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->organization = $request->organization;
        $user->website = $request->website;
        $user->phone_number = $request->phone_number;
        $user->preferred_language = $request->preferred_language;
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diupdate.');
    }
}
