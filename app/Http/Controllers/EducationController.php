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
        return view('educations.index', compact('educations'));
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
            'school_name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'end_month' => 'nullable|integer|between:1,12',
            'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'caption' => 'nullable|string|max:500',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('education_photos', 'public');
        }

        $education = Education::create([
            'user_id' => Auth::id(),
            'school_name' => $request->input('school_name'),
            'major' => $request->input('major'),
            'start_month' => $request->input('start_month'),
            'start_year' => $request->input('start_year'),
            'end_month' => $request->input('end_month') ?? null,
            'end_year' => $request->input('end_year') ?? null,
            'caption' => $request->input('caption') ?? null,
            'photo' => $photoPath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Education added successfully.',
            'education' => $education
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        if ($education->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($education->photo) {
            Storage::disk('public')->delete($education->photo);
        }

        $education->delete();
        return response()->json(['success' => true, 'message' => 'Education deleted successfully.']);
    }
}
