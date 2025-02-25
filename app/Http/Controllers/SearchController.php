<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        // $search = $request->get('search');
        // $users = User::where('name', 'like', '%' . $search . '%')->get();
        // return response()->json([
        //     'users' => $users->map(function ($user) {
        //         return [
        //             'id' => $user->id,
        //             'name' => $user->name,
        //             'profile_image' => $user->getProfileImage(),
        //             'created_at' => $user->created_at->diffForHumans()
        //         ];
        //     })
        // ]);
        return view('search.index');
    }

    public function listProfile(Request $request)
    {
        return view('list.profile');
    }

    public function listJobs(Request $request)
    {
        return view('list.jobs');
    }

    public function listCompany(Request $request)
    {
        return view('list.company');
    }
}
