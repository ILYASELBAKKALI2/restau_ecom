<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
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

            if(Route::is('admin.*')) {
                return route('admin.login');
            }
            
            else if(Route::is('livreur.*')){
              return route('livreur.login');
            }else{
            return route('login');
            }
        }

        
    }
}