<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;



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

        $file = $request->file('file');

        $content = Crypt::encrypt(file_get_contents($file));

        Storage::put(Auth::id() . '.' . $request->file('file')->extension(), $content);

    }
}