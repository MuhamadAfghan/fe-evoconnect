<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Job;
use App\Models\Company;
use App\Models\User;
use GuzzleHttp\Psr7\Message;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
    public function run(): void
    {
        // 1. Buat Data Dummy Perusahaan
        // $company = Company::firstOrCreate(
        //     ['name' => 'Example Company'],
        //     [
        //         'id' => Str::uuid(),
        //         'logo' => 'example_logo.png',
        //         'description' => 'Perusahaan teknologi yang berkembang pesat.',
        //         'industry' => 'Teknologi',
        //         'location' => json_encode(['city' => 'Jakarta', 'country' => 'Indonesia']),
        //         'website' => 'https://example.com',
        //         'company_size' => 500,
        //         'headquarters' => 'Jakarta',
        //         'type' => 'Private',
        //         'founded_year' => '2005-01-01',
        //         'specialties' => 'Software Development, Cloud Computing',
        //         'user_id' => null,
        //     ]
        // );

        // // 2. Buat Data Dummy Pekerjaan
        // Job::create([
        //     'id' => Str::uuid(),
        //     'title' => 'Software Engineer',
        //     'position' => 'Junior',
        //     'location' => 'Jakarta',
        //     'description' => 'Membangun aplikasi web.',
        //     'rating' => 4,
        //     'job_details' => 'Harus menguasai Laravel dan PostgreSQL.',
        //     'company_id' => $company->id, // Gunakan ID dari perusahaan yang sudah dibuat
        //     'users_id' => null, // Bisa null karena nullable
        // ]);

        // \App\Models\Messages::create([
        //     'content' => 'GAJIAN KAPAN EHHH MONYETRTTTT',
        //     'from_user_id' => '9e4b23de-c354-48a0-8e9c-e1c210e86043', //fz
        //     // 'from_user_id' => '9e4b22be-0d85-4784-863b-c310e05d2620',
        //     'to_user_id' => '9e4b565e-c39d-4d43-bfe0-6d345baa6dd4',
        //     'document' => 'fasda'
        // ]);
        // \App\Models\Messages::create([
        //     'content' => 'Gajelas eh',
        //     'to_user_id' => '9e4b23de-c354-48a0-8e9c-e1c210e86043',
        //     'from_user_id' => '9e4b22be-0d85-4784-863b-c310e05d2620',
        //     'document' => 'fasda'
        // ]);
        \App\Models\Blog::create([
            'title' => 'Sample Blog Post',
            'image' => 'sample-image.jpg',
            'category' => 'Technology',
            'content' => 'This is a sample blog post content.',
            'likes' => json_encode([]),
            'user_id' => "9e5b2a77-b592-4ccb-80f0-69297b5747bf"
        ]);
    }
}
