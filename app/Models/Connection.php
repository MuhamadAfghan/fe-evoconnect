<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Connection extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    use HasFactory, HasUuids;
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'status',
    ];

    public function fromUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function notification()
    {
        return $this->hasOne(Notification::class, 'connection_id');
    }
}
