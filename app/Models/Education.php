<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'user_id',
        'school_name',
        'major',
        'period',
        'caption',
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
