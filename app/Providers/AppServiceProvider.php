<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
                $key = explode(' ', $request->header('Authorization'));
                $user = User::where('api_key', $key[1])->first();
                if (!empty($user)) {
                    $request->request->add(['userid' => $user->id]);
                }
                return $user;
            }
        });
    }
}
