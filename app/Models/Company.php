<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'name',
        'logo',
        'description',
        'industry',
        'location',
        'website',
        'company_size',
        'headquarters',
        'type',
        'founded_year',
        'specialties',
        'user_id'
    ];
}
