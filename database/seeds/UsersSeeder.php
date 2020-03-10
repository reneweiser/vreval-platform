<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function ($user) {
            $user->givePermissionTo('create.projects');
            factory(App\Project::class, 5)->create()->each(function ($project) use($user) {
                $user->projects()->attach($project);
                Permission::create(['name' => "edit.projects.{$project->id}"]);
                Permission::create(['name' => "*.projects.{$project->id}"]);
                $user->givePermissionTo("*.projects.{$project->id}");
            });
        });
    }
}
