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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'position' => 'required|string',
            'location' => 'required|string',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'job_details' => 'required|string',
        ]);

        Job::create($request->all());

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully.');
    }

    public function jobProfile()
    {
        $jobs = Job::latest()->get();
        return view('profile.job-profile', compact('jobs'));
    }
}
