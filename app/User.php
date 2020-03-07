<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function assignRole($role)
    {
        $this->roles()->syncWithoutDetaching([$role->id]);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user');
    }

    public function assignProject($project)
    {
        $this->projects()->syncWithoutDetaching([$project->id]);
    }

    public function isRoleOnProject($role, $project)
    {
        $requiredRole = Role::where('slug', $role)->first();
        return $this->projects->contains($project)
            && $this->projects()
                ->wherePivot('role_id', $requiredRole->id)
                ->get()
                ->contains($project);
    }
}
