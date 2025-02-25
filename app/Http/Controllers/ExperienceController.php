<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::where('user_id', auth()->id())->get();
        return ApiFormatter::sendResponse('success', 200, 'Experience list', $experiences);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'end_month' => 'nullable|integer|between:1,12',
            'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'caption' => 'nullable|string|max:500',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = $request->hasFile('photo') ? $request->file('photo')->store('experience_photos', 'public') : null;

        $experience = Experience::create([
            'user_id' => Auth::id(),
            'job_title' => $request->job_title,
            'company_name' => $request->company_name,
            'start_month' => $request->start_month,
            'start_year' => $request->start_year,
            'end_month' => $request->end_month,
            'end_year' => $request->end_year,
            'caption' => $request->caption,
            'photo' => $photoPath,
        ]);

        return ApiFormatter::sendResponse('success', 201, 'Experience added successfully.', $experience);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        if ($experience->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($experience->photo) {
            Storage::disk('public')->delete($experience->photo);
        }

        $experience->delete();
        return ApiFormatter::sendResponse('success', 200, 'Experience deleted successfully.');
    }
}
