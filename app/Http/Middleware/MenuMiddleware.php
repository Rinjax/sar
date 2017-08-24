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
        array_push($roles,'standard');
        
        \Menu::make('MyNavBar', function($menu){
  
        $menu->add('Home')->data('permission','standard')->prepend('<span class=" fa fa-cog"></span> ');
        $menu->add('My Profile', 'profile')->data('permission','standard') ->prepend('<span class="glyphicon glyphicon-user"></span> ');//->link->secure();
        $menu->add('My Dog', 'dog')->data('permission','standard')->prepend('<span class="fa fa-paw"></span> ');
        $menu->add('Calendar',  'calendar') ->data('permission','standard')->prepend('<span class="fa fa-calendar"></span> ');
        $menu->add('Op Training Off',  'oto') ->data('permission','standard')->prepend('<span class="fa fa-paw"></span> ');
        $menu->add('Training Off',  'to') ->data('permission','standard')->prepend('<span class="fa fa-graduation-cap"></span> ');
        $menu->add('Equipment Off', 'eo') ->data('permission','standard')->prepend('<span class="fa fa-binoculars"></span> ');
  
        })
        
        ->filter(function($item) use ($roles){
            if( in_array($item->permission, $roles) ) {
                return true;
            } 

            return false;
        });
    }
    
    
}
