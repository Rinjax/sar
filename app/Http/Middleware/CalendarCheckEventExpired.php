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

        switch ($request['cal_type']){
            case 'training':
                $event = \App\Models\cal_training::where('id', $request->cal_id)->first();
                break;
                
            case 'mock':
                $event = \App\Models\cal_mock::where('id',$request->mock_id)->first();
                break;

            // these are new events trying to be created from the Modals
            case 'Mock Assessment' || 'Team Training':

                $event = new \stdClass();

                if(isset($request->datetimepicker)){
                    $event->start = $request->datetimepicker;
                }
                break;
        }
        
        $now = Carbon::now();
        $start = new Carbon($event->start);
        
        if ($now->gt($start)) {
            Session::flash('error', 'Event has already past!');
            return redirect('/dashboard');
        }
            
            
            
        return $next($request);
    }
}
