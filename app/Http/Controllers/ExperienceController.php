<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\FlareClient\Api;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::where('user_id', auth()->id())->get();
        return ApiFormatter::sendResponse('success', 200, 'Experiences retrieved successfully.', $experiences);
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
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'end_month' => 'nullable|integer|between:1,12',
            'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'caption' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $experience = new Experience();
        $experience->user_id = auth()->id();
        $experience->job_title = $request->job_title;
        $experience->company_name = $request->company_name;
        $experience->start_month = $request->start_month;
        $experience->start_year = $request->start_year;
        $experience->end_month = $request->end_month;
        $experience->end_year = $request->end_year;
        $experience->caption = $request->caption;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('experience_photos', 'public');
            $experience->photo = $path;
        }

        $experience->save();

        return ApiFormatter::sendResponse('success', 200, 'Experience created successfully.', $experience);
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
        if ($experience->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'caption' => 'required|string',
            'photo' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($experience->photo) {
                Storage::disk('public')->delete($experience->photo);
            }

            $photo = $request->file('photo');
            $path = $photo->store('experience-photos', 'public');
            $data['photo'] = $path;
        }

        $experience->update($data);

        return ApiFormatter::sendResponse('success', 200, 'Experience updated successfully.', $experience);
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
