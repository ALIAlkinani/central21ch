<?php

namespace App\Providers;

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
        'App\Poem' => 'App\Policies\PoemPolicy',
        'App\Reply' => 'App\Policies\ReplyPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Translate' => 'App\Policies\TranslatePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user){
            if ($user->name === 'admin')
            
            return true;
        


        });
    }
}
