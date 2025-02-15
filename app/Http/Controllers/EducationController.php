<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
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
            'school_name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'period' => 'required|string',
            'caption' => 'nullable|string',
            'photo' => 'nullable|image|max:2048'
        ]);

        // Simpan data pendidikan
        $education = new Education();
        $education->school_name = $request->school_name;
        $education->major = $request->major;
        $education->period = $request->period;
        $education->caption = $request->caption;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('education_photos', 'public');
            $education->photo = $photoPath;
        }

        $education->save();

        return response()->json(['success' => true, 'education' => $education]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        if ($education->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($education->photo) {
            Storage::disk('public')->delete($education->photo);
        }

        $education->delete();
        return response()->json(['success' => true]);
    }
}
