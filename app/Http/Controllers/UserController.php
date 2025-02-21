<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
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

    public function updateAbout(Request $request)
    {
        $request->validate([
            'about' => 'nullable|string|max:1000',
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:255',
        ]);

        $user = Auth::user();
        $user->about = $request->about;
        $user->skills = $request->skills; // Assuming skills is a JSON column in the users table
        $user->save();

        return redirect()->back()->with('success', 'About me updated successfully!');
    }

    public function updateSave(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . Auth::id(),
            'birthdate' => 'nullable|date',
            'gender' => 'required|in:male,female',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'phone' => 'nullable|string|max:20|unique:users,phone,' . Auth::id(),
            'headline' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->birthdate = $request->birthdate;
        $user->gender = $request->gender;
        $user->location = $request->location;
        $user->website = $request->website;
        $user->phone = $request->phone;
        $user->headline = $request->headline;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    // Define the save method
    public function save(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . auth()->id(),
            'birthdate' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'location' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
        ]);

        // return $request;

        $user = Auth::user();
        $user->username = $request->username;
        $user->birthdate = $request->birthdate;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->phone = $request->phone;
        $user->website = $request->website;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function medsos(Request $request)
    {
        $validatedData = $request->validate([
            'saved_medsos' => 'nullable|array',
            'saved_medsos.*' => 'nullable|array',
            'saved_medsos.*.*' => 'required|string|max:255',
            'medsos' => 'nullable|array',
            'medsos.*' => 'nullable|array',
            'medsos.*.*' => 'required|string|max:255',
        ]);

        $platformLinks = [
            'instagram' => 'https://instagram.com/',
            'facebook' => 'https://facebook.com/',
            'twitter' => 'https://twitter.com/',
            'youtube' => 'https://youtube.com/',
            'github' => 'https://github.com/',
        ];

        $socialLinks = [];

        // Proses data yang sudah tersimpan
        if (!empty($validatedData['saved_medsos'])) {
            foreach ($validatedData['saved_medsos'] as $platform => $usernames) {
                foreach ($usernames as $username) {
                    if (!empty($username) && isset($platformLinks[$platform])) {
                        $socialLinks[$platform][] = [
                            'username' => $username,
                            'link' => $platformLinks[$platform] . $username,
                        ];
                    }
                }
            }
        }

        // Tambahkan input baru tanpa menghapus yang lama
        if (!empty($validatedData['medsos'])) {
            foreach ($validatedData['medsos'] as $platform => $usernames) {
                foreach ($usernames as $username) {
                    if (!empty($username) && isset($platformLinks[$platform])) {
                        $socialLinks[$platform][] = [
                            'username' => $username,
                            'link' => $platformLinks[$platform] . $username,
                        ];
                    }
                }
            }
        }

        User::where('id', Auth::id())->update([
            'medsos' => json_encode($socialLinks),
        ]);

        return redirect()->back()->with('success', 'Profil media sosial berhasil diperbarui.');
    }


    public function detailUser(User $user)
    {
        // return $user;
        return view('profile.profile', compact('user'));
    }

    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('profile.profile', compact('user'));
    }
}
