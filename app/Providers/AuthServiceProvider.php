<?php

namespace App\Providers;

use App\Models\Catalog;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
    public function boot(){
        $this->registerPolicies();

        Gate::define('isUser', function ($user) {
            return $user->hasRole('user');
        });
        Gate::define('isAdmin', function ($user) {
            return $user->hasRole('admin');
        });
        Gate::define('isCompany', function ($user) {
            return $user->hasRole('company');
        });
         Gate::define('isSoldout', function ($user,$id) {
            $_catalog =new Catalog;
            $event = $_catalog->getEventById($id);
            return ($event->bigl_tot > $event->bigl_acquis);
        });
    }
}
