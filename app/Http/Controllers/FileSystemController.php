<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileSystemController extends Controller
{
    protected $memberManager;

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('filesystem');
    }

    public function uploadPoliceVettingForm(Request $request)
    {
        $path = storage_path() . '/Vet Forms';

        $obj = $request->file('file')->storeAs(
            'Vet Forms', 'yay'
        );

        dd($path);
    }
}