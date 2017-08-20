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
        
        
        $start = new Carbon($dog->start_program);
        $start = $start->format('d/m/y');
        $stage = new Carbon($dog->start_program);
        $stage1 = $stage->addMonths(4)->format('M Y');
        $stage2 = $stage->addMonths(4)->format('M Y');
        $stage3 = $stage->addMonths(4)->format('M Y');
        $stage4 = $stage->addMonths(4)->format('M Y');
        $stage5 = $stage->addMonths(4)->format('M Y');
        $stage6 = $stage->addMonths(4)->format('M Y');
        
        
        
        $assessments = \App\Models\dog_assessments::where('dog_id', ($dog->id))->get();       
        foreach ($assessments as $assessment){
            $assessment->location = $assessment->locationName->name;
            $assessDate = new Carbon($assessment->date);
            $assessment->d = $assessDate->format('d-m-Y');
        }
        
        
        
        $data = array(
            'name' => $dog->name,
            'breed' => $dog->breed,
            'start' => $start,
            'level' => $dog->level,
            'ticket_exp' => $ticket_date,
            'ticket_days' => $daysLeft,
            'assessments' => $assessments,
            'stage1' => $stage1,
            'stage2' => $stage2,
            'stage3' => $stage3,
            'stage4' => $stage4,
            'stage5' => $stage5,
            'stage6' => $stage6,
        );
       
        return view ('dog')->with($data);
    }
}
