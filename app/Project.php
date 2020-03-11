<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Project extends Model {
    protected $fillable = [
        'name', 'description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->as('membership')
            ->withTimestamps();
    }

    public function attachOwner(User $user)
    {
        $permission = Permission::create(['name' => "*.projects.{$this->id}"]);
        $user->givePermissionTo($permission);
        $this->users()->attach($user);
    }

    public function attachMember(User $user)
    {
        $permission = Permission::firstOrCreate(['name' => "edit.projects.{$this->id}"]);
        $user->givePermissionTo($permission);
        $this->users()->attach($user);
    }

    public function deletePermissions()
    {
        $users = $this->users()->get();
        $ownerPermission = Permission::where('name', "*.projects.{$this->id}")->first();
        $memberPermission = Permission::where('name', "edit.projects.{$this->id}")->first();
        foreach ($users as $user)
        {
            if ($ownerPermission !== null)
            {
                $user->revokePermissionTo($ownerPermission);
            }
            if ($memberPermission !== null)
            {
                $user->revokePermissionTo($memberPermission);
            }
        }
        if ($ownerPermission !== null)
        {
            $ownerPermission->delete();
        }
        if ($memberPermission !== null)
        {
            $memberPermission->delete();
        }
    }
}
