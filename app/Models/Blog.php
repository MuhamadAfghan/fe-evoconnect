<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'content',
        'category',
        'image',
        'user_id',
        'likes',
        'slug',
    ];

    protected $appends = ['is_liked'];

    protected $casts = [
        'likes' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsLikedAttribute()
    {
        return collect($this->likes)->contains('user_id', auth()->id());
    }
}
