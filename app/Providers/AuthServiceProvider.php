<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-project', 'App\Policies\ProjectPolicy@create');
        Gate::define('update-project', 'App\Policies\ProjectPolicy@update');
        Gate::define('publish-project', 'App\Policies\ProjectPolicy@publish');
        Gate::define('invite-project-members', 'App\Policies\ProjectPolicy@invite');
        Gate::define('delete-project', 'App\Policies\ProjectPolicy@delete');
    }
}
