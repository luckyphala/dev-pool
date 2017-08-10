<?php
/**
 * Created by PhpStorm.
 * @author Rivalani Simon Hlengani
 * @since 2017/08/05
 * Time: 1:35 PM
 */

namespace App\Providers;



use App\Models\User;
use mmghv\LumenRouteBinding\RouteBindingServiceProvider;

class RouteBindServiceProvider extends RouteBindingServiceProvider
{
    public function boot()
    {
        $binder = $this->binder;
        $binder->bind('user', User::class);
    }
}