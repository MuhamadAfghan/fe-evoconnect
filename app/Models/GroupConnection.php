<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupConnection extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function members()
    {
        return $this->hasMany(GroupMember::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_members');
    }

    public function isAdmin($userId)
    {
        return $this->members()->where('user_id', $userId)->where('role', 'admin')->exists();
    }

    public function admins()
    {
        return $this->members()->where('role', 'admin')->get();
    }
}
