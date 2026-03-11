<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Purchase;

class PurchaseController extends Controller
{

    public function buy($id)
    {
        $course = Course::find($id);

        return view('purchase', compact('course'));
    }


    public function confirm(Request $request)
    {

        $request->validate([
            'payment_slip' => 'required|image'
        ]);

        $file = $request->file('payment_slip');

        $filename = time().'.'.$file->getClientOriginalExtension();

        $file->move(public_path('payment_slips'), $filename);

        Purchase::create([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
            'payment_slip' => $filename,
            'status' => 'pending'
        ]);

        return redirect('/')->with('success','ส่งหลักฐานแล้ว รอแอดมินอนุมัติ');

    }

}