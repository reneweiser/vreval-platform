<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class, 'ability_role');
    }

    public function allowTo($ability)
    {
        $this->abilities()->save($ability);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
