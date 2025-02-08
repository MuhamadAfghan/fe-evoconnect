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
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        // Simpan foto baru
        $path = $request->file('profile_photo')->store('profile-photos', 'public');
        $user->profile_photo_path = $path;
        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diubah.');
    }

    public function deletePhoto(Request $request)
    {
        $user = Auth::user();

        // Hapus foto jika ada
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }
}
