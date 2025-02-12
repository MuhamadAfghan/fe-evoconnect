<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'position',
        'location',
        'description',
        'rating',
        'industry',
        'company_id',
        'job_details',
        'job_photo_path',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'job_details' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($job) {
            $job->id = (string) Str::uuid();
        });
    }
}
