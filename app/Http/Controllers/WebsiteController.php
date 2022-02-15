<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;

use Auth;
use File;

class WebsiteController extends Controller
{
    //
    public function index()
    {
        $data = Student::where('status',1)->get();
        return view('frontend/index',compact('data'));
    }
}