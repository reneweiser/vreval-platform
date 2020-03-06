<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'ability_role');
    }
}
