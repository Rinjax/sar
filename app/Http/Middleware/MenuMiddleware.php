<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MenuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->buildMenu();
        return $next($request);
    }
    
    protected function buildMenu()
    {

        $roles = Auth::user()->roles->pluck('role')->toArray();
        $permissions = Auth::user()->permissions->pluck('permission')->toArray();
        array_push($roles,'standard');
        $access = array_merge($roles, $permissions);

        
        \Menu::make('MyNavBar', function($menu){
  
        $menu->add('Dashboard', 'dashboard')->data('permission','standard')->prepend('<span class=" fa fa-cog"></span> ');
        $menu->add('My Profile', 'profile')->data('permission','standard') ->prepend('<span class="glyphicon glyphicon-user"></span> ');//->link->secure();
        $menu->add('My Dog', 'dog')->data('permission','Dog Menu')->prepend('<span class="fa fa-paw"></span> ');
        $menu->add('Calendar',  'calendar') ->data('permission','standard')->prepend('<span class="fa fa-calendar"></span> ');

        $menu->add('Dev Section', 'dev') ->data('permission','dev')->prepend('<span class="fa fa-binoculars"></span> ');
            $menu->devSection->add('Op Training Off',  'oto') ->data('permission','standard')->prepend('<span class="fa fa-paw"></span> ');
            $menu->devSection->add('Training Off',  'to') ->data('permission','dev')->prepend('<span class="fa fa-graduation-cap"></span> ');
            $menu->devSection->add('Equipment Off', 'eo') ->data('permission','dev')->prepend('<span class="fa fa-binoculars"></span> ');
            $menu->devSection->add('Permissions', 'permissions') ->data('permission','dev')->prepend('<span class="fa fa-binoculars"></span> ');

  
        })
        
        ->filter(function($item) use ($access){
            if( in_array($item->permission, $access) ) {
                return true;
            } 

            return false;
        });
    }
    
    
}
