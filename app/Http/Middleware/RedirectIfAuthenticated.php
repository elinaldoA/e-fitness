<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            switch($guard){
                case 'recepcao':
                    return redirect(RouteServiceProvider::HOME_RECEPCAO);
                break;
                case 'nutricionistas':
                    return redirect(RouteServiceProvider::HOME_NUTRICIONISTAS);
                break;
                case 'professores':
                    return redirect(RouteServiceProvider::HOME_PROFESSORES);
                break;
            default:
                return redirect(RouteServiceProvider::HOME);
            break;
            }
        }

        return $next($request);
    }
}
