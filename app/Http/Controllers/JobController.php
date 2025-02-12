<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    // Tampilkan daftar job
    public function index()
    {
        $jobs = Job::with('company')->get();
        $companies = Company::all();
        return view('job.jobs', compact('jobs', 'companies'));
    }


    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required|string',
            'position' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            // 'job_details' => 'required|string',
            'company_id' => 'required|uuid|exists:companies,id',
        ]);

        // dd($request->all());

        $job_details = [
            "Seniority Level" => $request->seniority_level,
            "Industry" => $request->industry,
            "Employment Type" => $request->employment_type,
            "Job Functions" => $request->job_functions
        ];


        $job = Job::create([
            'title' => $request->title,
            'position' => $request->position,
            'location' => $request->location,
            'description' => $request->description,
            'rating' => $request->rating,
            'industry' => $request->industry,
            'company_id' => $request->company_id,
            'job_details' => json_encode($job_details)
        ]);

        return response()->json([
            'success' => true,
            'job' => $job,
            'company_name' => $job->company->name,
            'time' => $job->created_at->diffForHumans(),
        ]);
    }

    public function jobProfile(Job $job)
    {
        // Ambil data pekerjaan dari database (pastikan ada data)
        $job->load('company');
        // return $job;
        return view('profile.job-profile', compact('job'));
    }

    public function updatePhotoJob(Request $request, Job $job)
    {
        $request->validate([
            'job_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Pastikan user yang sedang login adalah pemilik job
        if (auth()->id() !== $job->company->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus foto lama jika ada
        if ($job->job_photo_path) {
            Storage::disk('public')->delete($job->job_photo_path);
        }

        // Simpan foto baru
        $path = $request->file('job_photo')->store('job-photos', 'public');

        // Simpan path ke database
        $job->update(['job_photo_path' => $path]);

        return redirect()->back()->with('success', 'Foto berhasil diubah.');
    }

    public function deletePhotoJob(Job $job)
    {
        // Pastikan user yang sedang login adalah pemilik job
        if (auth()->id() !== $job->company->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus foto jika ada
        if ($job->job_photo_path) {
            Storage::disk('public')->delete($job->job_photo_path);
            $job->update(['job_photo_path' => null]);
        }

        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }
}
