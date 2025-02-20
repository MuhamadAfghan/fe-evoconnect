<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::where('user_id', auth()->id())->get();
        return ApiFormatter::sendResponse('success', 200, 'Education list', $educations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('educations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'schoolName' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'startMonth' => 'required|string|between:1,12',
            'startYear' => 'required|string',
            'endMonth' => 'nullable|string|between:1,12',
            'endYear' => 'nullable|string',
            'caption' => 'nullable|string|max:500',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('education_photos', 'public');
        }

        $education = Education::create([
            'user_id' => Auth::id(),
            'school_name' => $request->input('schoolName'),
            'major' => $request->input('major'),
            'start_month' => $request->input('startMonth'),
            'start_year' => $request->input('startYear'),
            'end_month' => $request->input('endMonth'),
            'end_year' => $request->input('endYear'),
            'caption' => $request->input('caption'),
            'photo' => $photoPath ?? null,
        ]);
        return ApiFormatter::sendResponse('success', 202, 'Education added successfully.', $education);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        if ($education->user_id !== auth()->id()) {
            return redirect()->route('educations.index')->with('error', 'Unauthorized');
        }

        if ($education->photo) {
            Storage::disk('public')->delete($education->photo);
        }

        $education->delete();
        return redirect()->route('educations.index')->with('success', 'Education deleted successfully.');
    }
}
