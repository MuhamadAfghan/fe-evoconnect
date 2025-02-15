<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'google_i d',
        'profile_photo_path',
        'provider',
        'email_verified_at',
        'about',
        'username',
        'birthdate',
        'gender',
        'location',
        'website',
        'headline',
        'medsos',
        'last_seen',
        'skills',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
        'birthdate' => 'date',
        'skills' => 'array',
        'medsos' => 'array',
    ];

    /**
     * Append custom attributes.
     */
    protected $appends = [
        'profile_photo_url',
        'is_online',
    ];

    /**
     * Get profile image URL.
     */
    public function getProfileImage()
    {
        if ($this->profile_photo_path) {
            return Storage::disk('public')->exists($this->profile_photo_path)
                ? asset('storage/' . $this->profile_photo_path)
                : $this->profile_photo_path;
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
    }

    /**
     * Get the full URL of the profile photo.
     */
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->provider === 'google') {
            return $this->profile_photo_path;
        } elseif (!empty($this->profile_photo_path) && Storage::disk('public')->exists($this->profile_photo_path)) {
            return asset('storage/' . $this->profile_photo_path);
        } else {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
        }
    }

    /**
     * Check if the user is online.
     */
    public function isOnline()
    {
        return $this->last_seen && $this->last_seen->diffInMinutes(Carbon::now('Asia/Jakarta')) < 10;
    }

    public function getIsOnlineAttribute()
    {
        return $this->isOnline();
    }

    /**
     * Relasi ke tabel Job (pekerjaan yang dibuat oleh user).
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Relasi many-to-many untuk pekerjaan yang disimpan oleh user.
     */
    public function savedJobs()
    {
        return $this->hasMany(JobUserSaved::class, 'user_id');
    }


    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
}
