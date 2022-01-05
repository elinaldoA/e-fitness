<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() ||
            ($request->user() instanceof MustVerifyEmail &&
                ! $request->user()->hasVerifiedEmail())) {

            if($request->expectsJson()) {
                return abort(403, 'Your email address is not verified.');
            }else{
                return $this->checkGuard($redirectToRoute);
            }
        }

        return $next($request);
    }

    private function checkGuard($redirectToRoute)
    {
        if(Auth::guard('recepcao')->check()) {
            return Redirect::route($redirectToRoute ?: 'efitness.recepcao.verification.notice');
        }elseif(Auth::guard('professores')->check()) {
            return Redirect::route($redirectToRoute ?: 'efitness.professores.verification.notice');
        }elseif(Auth::guard('nutricionistas')->check()) {
            return Redirect::route($redirectToRoute ?: 'efitness.nutricionistas.verification.notice');
        }elseif(Auth::guard('admin')->check()) {
            return Redirect::route($redirectToRoute ?: 'efitness.admin.verification.notice');
        }else{
            return Redirect::route($redirectToRoute ?: 'verification.notice');
        }
    }
}
