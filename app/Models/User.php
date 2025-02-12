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
        'google_id',
        'profile_photo_path', // ✅ Sesuaikan dengan migration dan controller
        'provider',
        'email_verified_at',
        'about',
        'last_seen',
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
            if (Storage::disk('public')->exists($this->profile_photo_path)) {
                return asset('storage/' . $this->profile_photo_path);
            }

            return $this->profile_photo_path;
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
    }

    /**
     * Get the full URL of the profile photo.
     */
    public function getProfilePhotoUrlAttribute()
    {
        // return $this->profile_photo_path
        //     ? asset('storage/' . $this->profile_photo_path)
        //     : asset('images/default-profile.png');

        if ($this->provider == 'google') {
            return $this->profile_photo_path;
        } elseif (($this->provider == 'email' && $this->photo) && Storage::disk('public')->exists($this->photo)) {
            return asset('storage/' . $this->profile_photo_path);
        } else {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
        }
    }

    public function isOnline()
    {
        return $this->last_seen && $this->last_seen->diffInMinutes(Carbon::now()) < 10;
    }
    public function getIsOnlineAttribute()
    {
        return $this->last_seen && $this->last_seen->diffInMinutes(Carbon::now()) < 10;
    }
}
