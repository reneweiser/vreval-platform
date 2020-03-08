<?php

use Illuminate\Database\Seeder;
use App\Ability;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ability::create([
            'name' => 'Create Project',
            'slug' => 'create-project',
        ]);
        Ability::create([
            'name' => 'Update Project',
            'slug' => 'update-project',
        ]);
        Ability::create([
            'name' => 'Publish Project',
            'slug' => 'publish-project',
        ]);
        Ability::create([
            'name' => 'Delete Project',
            'slug' => 'delete-project',
        ]);
        Ability::create([
            'name' => 'Invite to Project',
            'slug' => 'invite-to-project',
        ]);
    }
}
