<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $courses = Course::where('status', 'published')->get();
        return view('index', compact('courses'));
    }
}
