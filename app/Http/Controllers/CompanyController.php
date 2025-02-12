<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:companies,name',
        ]);

        $company = Company::create([
            'id' => Str::uuid()->toString(), // Buat UUID untuk perusahaan baru
            'name' => $request->name,
            'logo' => 'default.png', // Bisa diubah sesuai kebutuhan
            'description' => 'Deskripsi belum tersedia',
            'industry' => 'Unknown',
            'location' => json_encode([]),
            'website' => '',
            'company_size' => 0,
            'headquarters' => '',
            'type' => 'Unknown',
            'founded_year' => now()->format('Y-m-d'),
            'specialties' => '',
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'company' => $company,
        ]);
    }
}
