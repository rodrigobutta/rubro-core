<?php

namespace App\Providers;

use Laravel\Passport\Passport;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        //

        // Auth::viaRequest('firebase', function ($request) {
        //     return app(FirebaseGuard::class)->user($request);
        // });

        // $this->app['auth']->viaRequest('firebase', function ($request) {
        //     // return app(\csrui\LaravelFirebaseAuth\Guard::class)->user($request);
        //     return app(\App\Firebase\Guard::class)->user($request);
        // });


    }
}
