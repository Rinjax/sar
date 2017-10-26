<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;
use App\Processors\SffwDates;


class ToController extends Controller
{


    public function index()
    {

        $sffw = new SffwDates();

        $members = member::with('getTrainingCompleted')->orderBy('name')->get();


        foreach ($members as $member)
        {

            $sffw->getSffwDates($member);

        }


        $data = [
            'members' => $members,
        ];


        return view('to')->with($data);

    }
}
