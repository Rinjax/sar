<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CalendarCheckEventExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * check to see if the event that the action is being called on, has past by already. If it has then dont perform
     * any action on the event and redirect
     *
     */
    public function handle($request, Closure $next)
    {
        $uri = $request->path();

        if ($uri == 'modifyEvent'){
            $event = \App\Models\calendar::where('id', $request->cal_id)->first();
        }else{
            $event = new \stdClass();

            $event->start = $request->datetimepicker;

        }

        //dd($event);
        
        $now = Carbon::now();
        $start = new Carbon($event->start);
        
        if ($now->gt($start)) {
            Session::flash('error', 'Event has already past!');
            return redirect('/dashboard');
        }
            
            
            
        return $next($request);
    }
}
