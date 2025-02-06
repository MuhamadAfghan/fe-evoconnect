<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    public $incrementing = false; // Karena pakai UUID

    protected $fillable = [
        'id',
        'position',
        'decscription',
        'location',
        'rating',
        'job_details',
        'title',
        'users_id',
        'company_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($job) {
            $job->id = Str::uuid(); // Generate UUID otomatis
        });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
