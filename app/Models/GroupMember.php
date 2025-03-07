<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_id', 'group_connection_id', 'role', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function groupConnection()
    {
        return $this->belongsTo(GroupConnection::class, 'group_connection_id');
    }
}
