<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'id' => Str::uuid(),
            'name' => 'PT Maju Jaya',
            'logo' => 'default_logo.png', // Isi dengan path/logo default
        ]);

        Company::create([
            'id' => Str::uuid(),
            'name' => 'CV Sejahtera',
            'logo' => 'default_logo.png',
        ]);
    }
}
