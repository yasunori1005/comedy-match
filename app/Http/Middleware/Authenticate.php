<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    protected $user_route = 'user.login';
    protected $company_route = 'company.login';
    protected $admin_route = 'admin.login';

    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            if (Route::is('company.*')) {
                return route($this->company_route);
            } elseif (Route::is('admin.*')) {
                return route($this->admin_route);
            } else {
                return route($this->user_route);
            }
        }
        // return $request->expectsJson() ? null : route('login');
    }
}
