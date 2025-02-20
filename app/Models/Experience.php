<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Experience extends Model
{
    use HasFactory;

    public $incrementing = false; // UUID bukan auto-increment
    protected $keyType = 'string'; // Pastikan primary key bertipe string

    protected $fillable = [
        'id', // Tambahkan id agar bisa diisi otomatis
        'user_id',
        'job_title',
        'company_name',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'caption',
        'photo',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($experience) {
            if (!$experience->id) {
                $experience->id = (string) Str::uuid(); // Set UUID otomatis jika belum ada
            }
        });
    }

    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
