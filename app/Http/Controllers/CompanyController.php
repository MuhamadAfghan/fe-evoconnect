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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'industry' => 'required|string',
            'location' => 'required|string',
            'website' => 'required|string',
            'company_size' => 'required|integer',
            'headquarters' => 'required|string',
            'type' => 'required|string',
            'founded_year' => 'required|date',
            'specialties' => 'required|string',
        ]);

        $path = $request->file('logo')->store('public/logos');
        $path = str_replace('public/', '', $path); // Menghapus 'public/' dari path

        $company = Company::create([
            'id' => Str::uuid()->toString(),
            'name' => $request->name,
            'logo' => $path,
            'description' => $request->description,
            'industry' => $request->industry,
            'location' => $request->location,
            'website' => $request->website,
            'company_size' => $request->company_size,
            'headquarters' => $request->headquarters,
            'type' => $request->type,
            'founded_year' => $request->founded_year,
            'specialties' => $request->specialties,
            'user_id' => auth()->user()->id
        ]);

        return response()->json([
            'success' => true,
            'company' => $company
        ]);
    }
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('profile.company-profile', compact('company'));
    }
}
