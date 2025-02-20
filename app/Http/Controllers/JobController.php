<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\JobRecord;

class JobController extends Controller
{
    // Menampilkan daftar pekerjaan
    public function index()
    {
        $jobs = Job::with('company')->get();
        $companies = Company::all();
        return view('job.jobs', compact('jobs', 'companies'));
    }

    // Menyimpan pekerjaan baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'position' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'company_id' => 'required|uuid|exists:companies,id',
        ]);

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
            'job_details' => json_encode($job_details),
        ]);

        return response()->json([
            'success' => true,
            'job' => $job,
            'company_name' => $job->company->name,
            'time' => $job->created_at->diffForHumans(),
        ]);
    }

    // Menampilkan profil pekerjaan
    public function jobProfile(Job $job)
    {
        $job->load('company');
        return view('profile.job-profile', compact('job'));
    }



    // Mengupdate foto pekerjaan
    public function updatePhotoJob(Request $request, Job $job)
    {
        $request->validate([
            'job_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (auth()->id() !== $job->company->user_id) {
            abort(403, 'Unauthorized action.');
        }

        if ($job->job_photo_path) {
            Storage::disk('public')->delete($job->job_photo_path);
        }

        $path = $request->file('job_photo')->store('job-photos', 'public');
        $job->update(['job_photo_path' => $path]);

        return redirect()->back()->with('success', 'Foto berhasil diubah.');
    }

    // search jobs
    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil input pencarian

        // Cari jobs yang mengandung kata kunci di title atau description
        $jobs = Job::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(10); // Pagination agar hasilnya tidak terlalu panjang

        return view('job.jobs', compact('jobs', 'query'));
    }

    // public function apply(Request $request, $job)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'cover_letter' => 'required|string',
    //     ]);

    //     auth()->user()->applications()->create([
    //         'job_id' => $job,
    //         'cover_letter' => $request->cover_letter,
    //     ]);

    //     return redirect()->back()->with('success', 'Application submitted successfully.');
    // }
}
