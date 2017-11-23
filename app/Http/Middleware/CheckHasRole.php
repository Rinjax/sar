<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        $user = Auth::user();
        if($user->hasRole($role)) return $next($request);

        Session::flash('error', "You're Not Authorised to modify calendar entries!");
        return redirect('/dashboard');
    }
}
