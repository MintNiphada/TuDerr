<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // หน้าแสดงคอร์สทั้งหมด
    public function index()
    {
        $courses = Course::where('status', 'published');
        return view('index', compact('courses'));
    }

    // หน้ารายละเอียดคอร์ส
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $payment = $course->payments()->where('user_id', Auth::user()->id)->first();
        return view('detailcourse', compact('course', 'payment'));
    }
}
