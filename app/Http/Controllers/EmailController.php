<?php

namespace App\Http\Controllers;

use App\Mail\firstTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendTest()
    {
        Mail::to('steve.temple@searchdogssussex.com')->queue(new firstTest());
        
        return "Email has been queued for sending";
    }
}
