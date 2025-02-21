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

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'google_id',
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_seen' => 'datetime',
        'birthdate' => 'date',
        'skills' => 'array',
        'medsos' => 'array',
    ];

    protected $appends = [
        'profile_photo_url',
        'is_online',
        // 'friends',
    ];

    // public function getFriendsAttribute()
    // {
    //     $friends = auth()->user()->connections->map(function ($connection) {
    //         return $connection->toUser;
    //     });

    //     $receivedFriends = auth()->user()->receivedConnections->map(function ($connection) {
    //         return $connection->fromUser;
    //     });

    //     return $friends->merge($receivedFriends);
    // }


    public function getProfileImage()
    {
        if ($this->profile_photo_path) {
            return Storage::disk('public')->exists($this->profile_photo_path)
                ? asset('storage/' . $this->profile_photo_path)
                : $this->profile_photo_path;
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
    }

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

    public function isOnline()
    {
        return $this->last_seen && $this->last_seen->diffInMinutes(Carbon::now('Asia/Jakarta')) < 10;
    }

    public function getIsOnlineAttribute()
    {
        return $this->isOnline();
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

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

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function toUser()
    {
        return $this->hasMany(RequestConnection::class, 'to_user_id');
    }

    public function fromUser()
    {
        return $this->hasMany(RequestConnection::class, 'from_user_id');
    }

    public function connections()
    {
        return $this->hasMany(MasterConnection::class, 'from_user_id');
    }

    public function receivedConnections()
    {
        return $this->hasMany(MasterConnection::class, 'to_user_id');
    }
}
