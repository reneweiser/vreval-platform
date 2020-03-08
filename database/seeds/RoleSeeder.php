<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::create([
            'name' => 'User',
            'slug' => 'user',
        ]);
        $user->abilities()->sync([1]);

        $owner = Role::create([
            'name' => 'Project Owner',
            'slug' => 'project-owner',
        ]);
        $owner->abilities()->sync([2,3,4,5]);

        $member = Role::create([
            'name' => 'Project Member',
            'slug' => 'project-member',
        ]);
        $member->abilities()->sync([2]);
    }
}
