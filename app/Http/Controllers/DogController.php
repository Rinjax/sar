<?php

namespace App\Http\Controllers;

use App\Managers\DogManager;
use Illuminate\Http\Request;
use \App\Models\Dog;
use Illuminate\Support\Facades\Auth;
use \App\Models\Dog_assessments;
use Carbon\Carbon;

class DogController extends Controller
{
    protected $dogManager;

    public function __construct()
    {
        $this->dogManager = new DogManager();
    }


    public function index (){
        
        
        $dog = \App\Models\Dog::where('member_id', Auth::id())->first();

        $dog->ticketDays = $this->dogManager->getTicketExpiryDays($dog->operational_date);
        
        $assessments = \App\Models\DogAssessment::where('dog_id', ($dog->id))->get();       




        $data = array(
           
            'assessments' => $assessments,
            'dog' => $dog

        );
       
        return view ('dog')->with($data);
    }
}
