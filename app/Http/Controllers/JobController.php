<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Tampilkan daftar job
    public function index()
    {
        $jobs = Job::latest()->get();
        return view('job.jobs', compact('jobs'));
    }

    // Simpan job baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'position' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'location' => 'required|string',
            'decscription' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'job_details' => 'required|string',
        ]);

        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully.');
    }

    // Tampilkan detail job
    public function show(Job $job)
    {
        return view('jobs.profile', compact('job'));
    }
}
