<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'active_group_id'];

    public function activeGroup(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'active_group_id');
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }

}

