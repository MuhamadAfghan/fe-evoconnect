<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id',
        'job_title',
        'company_name',
        'period',
        'caption',
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
