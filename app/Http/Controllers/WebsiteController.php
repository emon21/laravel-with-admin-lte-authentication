<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use App\Http\Controllers\Auth;

use File;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {


        $search = $request->search;
        $sortby = $request->sortby;

        $students = Student::query();
        //$students = New Student();


        if ($search) {
            $students->where('name','Like','%'.$search.'%');
        }

        if ($sortby && $sortby == 'latest') {
            $students->latest();
        }elseif($sortby && $sortby == 'oldest'){
            $students->oldest();
        }

        $students = $students->get();

        return view('frontend/index', compact('students'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $search = $request->search;
        if ($search) {
            $std = Student::where('name','Like','%'.$search.'%')->get();
        }
        // else{
        //     $std = Student::oldest()->get();
        // }
        $query = Student::query();
        if ($request->sortby == 'latest') {
            $query->latest();
        } else {
            $query->oldest();
        }


      // $sercount = Student::count($std);
        return view('frontend\search',compact('std'));
    }

}
