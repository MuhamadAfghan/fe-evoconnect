<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'position',
        'location',
        'description',
        'rating',
        'job_details',
        'company_id' => $company->id,
        'users_id' => null,
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($job) {
            $job->id = (string) Str::uuid();
        });
    }
}
