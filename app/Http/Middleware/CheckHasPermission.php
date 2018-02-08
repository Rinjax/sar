<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckHasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
    {
        $permissions = explode('|',$permissions);
        
        $user = Auth::user();


        foreach ($permissions as $permission){

            if($user->hasPermission($permission)) {
                return $next($request);
            }
        }

        Session::flash('error', "You're Not Authorised for that function!");
        return redirect('/dashboard');
    }
}
