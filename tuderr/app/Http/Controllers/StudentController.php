<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function myCourses()
    {
        $courses = Payment::where('user_id', Auth::id())->get();
        return view('student.mycourses', compact('courses'));
    }

    public function show($id){
        $course = Course::find($id);

        return view('student.course_detail', compact('course'));
    }

}