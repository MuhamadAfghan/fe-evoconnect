<?php

namespace App\Models;

use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'content',
        'user_id',
        'image',
        'type',
        'visibility',
    ];

    protected $casts = [
        'likes' => 'array',
    ];

    protected $appends = [
        'likes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function getLikesAttribute()
    {
        return $this->likes()->pluck('user_id')->toArray();
    }

    public function comments()
    {
        return $this->hasMany(CommentPost::class);
    }
}
