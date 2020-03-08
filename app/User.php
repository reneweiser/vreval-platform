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
        return $this->belongsToMany(Project::class, 'project_user')
            ->using(ProjectUser::class)
            ->as('responsibility')
            ->withPivot('role_id');
    }

    public function assignProject($project)
    {
        $this->projects()->syncWithoutDetaching([$project->id]);
    }

    public function isAbleTo($abilitySlug, $projectId)
    {
        return ProjectUser::where('user_id', $this->id)
            ->where('project_id', $projectId)
            ->first()
            ->isAllowedTo($abilitySlug);
    }
}
