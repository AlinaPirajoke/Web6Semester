<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $isRedactor = Auth::check() and $user->isRedactor();

        if (Auth::check() and $isRedactor)
            return $next($request);
        else
            return redirect()->to(RouteServiceProvider::HOME);
    }
}
