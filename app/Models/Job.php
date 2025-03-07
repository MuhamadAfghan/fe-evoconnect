<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs'; // Opsional jika tidak menggunakan konvensi Laravel

    protected $fillable = [
        'title',
        'position',
        'location',
        'description',
        'rating',
        'salary',
        'industry',
        'company_id',
        'job_details',
        'job_photo',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'job_details' => 'array',
    ];

    /**
     * Generate UUID ketika membuat job baru.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($job) {
            if (empty($job->id)) {
                $job->id = (string) Str::uuid();
            }
        });
    }

    /**
     * Relasi ke perusahaan (Company)
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relasi many-to-many dengan user (pekerjaan yang disimpan)
     */
    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'job_user_saved', 'job_id', 'user_id')->withTimestamps();
    }
}
