<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
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
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'caption' => 'required|string',
            'photo' => 'required|image|max:2048'
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $path = $photo->store('experience-photos', 'public');
            $data['photo'] = $path;
        }

        $experience = Experience::create($data);

        return response()->json([
            'success' => true,
            'data' => $experience,
            'photo_url' => Storage::url($experience->photo)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        if ($experience->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($experience->photo) {
            Storage::disk('public')->delete($experience->photo);
        }

        $experience->delete();
        return response()->json(['success' => true]);
    }
}
