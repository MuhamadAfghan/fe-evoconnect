<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RequestConnection extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'status',
    ];

    protected $casts = [
        'id' => 'string',
        'from_user_id' => 'string',
        'to_user_id' => 'string',
    ];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
