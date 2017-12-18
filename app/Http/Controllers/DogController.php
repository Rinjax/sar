<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\dog;
use Illuminate\Support\Facades\Auth;
use \App\Models\dog_assessments;
use Carbon\Carbon;

class DogController extends Controller
{
    public function index (){
        $dog = \App\Models\dog::where('member_id', Auth::id())->first();
        $ticket = new Carbon($dog->op_ticket_exp);
        $ticket_date = $ticket->format('d/m/y');
        $currentDate = Carbon::now();
        $daysLeft =  $currentDate ->diffInDays($ticket, false);
        
        $assessments = \App\Models\dog_assessments::where('dog_id', ($dog->id))->get();       




        $data = array(
           
            'ticket_exp' => $ticket_date,
            'ticket_days' => $daysLeft,
            'assessments' => $assessments,
            'dog' => $dog

        );
       
        return view ('dog')->with($data);
    }
}
