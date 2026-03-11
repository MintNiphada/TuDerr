<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function myCourses()
    {

        $courses = Purchase::where('user_id', Auth::id())
            ->where('status','approved')
            ->get();

        return view('student.mycourses', compact('courses'));

    }

}