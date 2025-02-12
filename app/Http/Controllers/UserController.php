<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            Storage::delete($user->profile_photo_path);
            $user->profile_photo_path = null;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'username' => 'required|string|email|max:255',
        ]);

        switch ($platform = $request->platform) {
            case 'facebook':
                $request->merge(['link' => 'https://facebook.com/' . $request->username]);
                break;
        }

        User::where('id', Auth::id())->update($request->only('platform', 'username', 'link'));

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    // save dan cancel di profile
    // public function save(Request $request)
    // {
    //     $request->validate([
    //         'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'username' => 'required|string|max:255|unique:users,username,' . auth()->id(),
    //         'birthdate' => 'required|date',
    //         'gender' => 'required|string',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
    //         'location' => 'required|string',
    //         'phone_number' => 'nullable|string|max:20',
    //         'organization' => 'nullable|string|max:255',
    //         'website' => 'nullable|url|max:255',
    //     ]);

    //     auth()->user()->update([
    //         'username' => $request->username,
    //     ]);

    //     return redirect()->route('')->with('success', 'Profile updated successfully!');
    // }

    public function updateAbout(Request $request)
    {
        $request->validate([
            'about' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();
        $user->about = $request->about;
        $user->save();

        return redirect()->back()->with('success', 'About updated successfully!');
    }
}
