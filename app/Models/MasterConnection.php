<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class MasterConnection extends Model
{
    use HasUuids;

    protected $fillable = [
        'to_user_id',
        'from_user_id',
        'request_id',
        'connected_at',
        'status'
    ];

    protected $casts = [
        'connected_at' => 'datetime',
    ];

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function request()
    {
        return $this->belongsTo(RequestConnection::class, 'request_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
