<?php

namespace App\Providers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function(User $user) {
            return $user->email === 'ed.stuckey@hotmail.co.uk';
        });

        Blade::if('admin', function() {
            return request()->user()?->can('admin');
        });

        Gate::define('allowEdit', function (User $user, $itemToEdit) {
            return $user->id === $itemToEdit->user_id;
        });

        Blade::if('allowEdit', function($user, $itemToEdit) {
            return $user->id === $itemToEdit->user_id;
        });
    }
}
