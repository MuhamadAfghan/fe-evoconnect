<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobUserSaved;
use Illuminate\Support\Facades\Auth;

class JobUserSavedController extends Controller
{
    // Menyimpan job ke dalam daftar favorit
    public function saveJob(Request $request)
    {
        $user = Auth::user();
        $jobId = $request->input('job_id');

        // Cek apakah job sudah disimpan sebelumnya
        $existingSavedJob = JobUserSaved::where('user_id', $user->id)
            ->where('job_id', $jobId)
            ->first();

        if ($existingSavedJob) {
            // Jika sudah tersimpan, hapus (unsave)
            $existingSavedJob->delete();
            return response()->json(['message' => 'Job berhasil dihapus dari daftar favorit!', 'status' => 'unsaved'], 200);
        }

        // Simpan job ke dalam daftar favorit
        JobUserSaved::create([
            'user_id' => $user->id,
            'job_id' => $jobId,
        ]);

        return response()->json(['message' => 'Job berhasil disimpan!', 'status' => 'saved'], 201);
    }


    // Menampilkan daftar job yang telah disimpan
    public function savedJobs()
    {
        $user = Auth::user();
        $savedJobs = $user->savedJobs()->with('job')->get(); // Memuat data job

        return view('profile.job-saved', compact('savedJobs'));
    }
}
