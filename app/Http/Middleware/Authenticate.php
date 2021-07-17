<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
       
            if($request->routeIs('section_manager.*')){
                return route('section_manager.login', config('app.locale'));
            }
            if($request->routeIs('admin.*')){
                return route('admin.login', config('app.locale'));
            }

            return route('login', config('app.locale'));
        }
    }
}
