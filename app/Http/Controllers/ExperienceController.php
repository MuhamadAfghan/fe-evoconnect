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
        ], [
            'job_title.required' => 'Job title is required.',
            'company_name.required' => 'Company name is required.',
            'start_month.required' => 'Start month is required.',
            'start_year.required' => 'Start year is required.',
            'photo.image' => 'The file must be an image.',
            'photo.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'photo.max' => 'The image may not be greater than 2MB.',
        ]);

        if ($request->hasFile('photo')) {
            try {
                $photoPath = $request->file('photo')->store('experience_photos', 'public');
            } catch (\Exception $e) {
                return ApiFormatter::sendResponse('error', 500, 'Failed to upload photo.', ['error' => $e->getMessage()]);
            }
        } else {
            $photoPath = null;
        }

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

        return ApiFormatter::sendResponse('success', 201, 'Experience added successfully.', [
            'experience' => $experience,
            'photo_url' => $photoPath ? asset('storage/' . $photoPath) : null,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $experience = Experience::find($id);

        if (!$experience) {
            return ApiFormatter::sendResponse('error', 404, 'Experience not found.');
        }

        if ($experience->user_id !== auth()->id()) {
            return ApiFormatter::sendResponse('error', 403, 'Unauthorized to view this experience.');
        }

        return ApiFormatter::sendResponse('success', 200, 'Experience details.', [
            'experience' => $experience,
            'photo_url' => $experience->photo ? asset('storage/' . $experience->photo) : null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $experience = Experience::find($id);

        if (!$experience) {
            return ApiFormatter::sendResponse('error', 404, 'Experience not found.');
        }

        if ($experience->user_id !== auth()->id()) {
            return ApiFormatter::sendResponse('error', 403, 'Unauthorized to update this experience.');
        }

        $request->validate([
            'job_title' => 'sometimes|string|max:255',
            'company_name' => 'sometimes|string|max:255',
            'start_month' => 'sometimes|integer|between:1,12',
            'start_year' => 'sometimes|integer|min:1900|max:' . date('Y'),
            'end_month' => 'nullable|integer|between:1,12',
            'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'caption' => 'nullable|string|max:500',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            try {
                // Hapus foto lama jika ada
                if ($experience->photo) {
                    Storage::disk('public')->delete($experience->photo);
                }

                // Simpan foto baru
                $photoPath = $request->file('photo')->store('experience_photos', 'public');
                $experience->photo = $photoPath;
            } catch (\Exception $e) {
                return ApiFormatter::sendResponse('error', 500, 'Failed to upload photo.', ['error' => $e->getMessage()]);
            }
        }

        $experience->update($request->only([
            'job_title',
            'company_name',
            'start_month',
            'start_year',
            'end_month',
            'end_year',
            'caption'
        ]));

        return ApiFormatter::sendResponse('success', 200, 'Experience updated successfully.', [
            'experience' => $experience,
            'photo_url' => $experience->photo ? asset('storage/' . $experience->photo) : null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);

        if (!$experience) {
            return ApiFormatter::sendResponse('error', 404, 'Experience not found.');
        }

        if ($experience->user_id !== auth()->id()) {
            return ApiFormatter::sendResponse('error', 403, 'Unauthorized to delete this experience.');
        }

        if ($experience->photo) {
            try {
                Storage::disk('public')->delete($experience->photo);
            } catch (\Exception $e) {
                return ApiFormatter::sendResponse('error', 500, 'Failed to delete photo.', ['error' => $e->getMessage()]);
            }
        }

        $experience->delete();
        return ApiFormatter::sendResponse('success', 200, 'Experience deleted successfully.');
    }
}
