<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // หน้าแสดงคอร์สทั้งหมด
    public function index()
    {
        $courses = Course::all();
        return view('index', compact('courses'));
    }

    // หน้ารายละเอียดคอร์ส
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('detailcourse', compact('course'));
    }
}
