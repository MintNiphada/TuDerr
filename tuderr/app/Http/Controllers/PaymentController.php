<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function buy($id)
    {
        $course = Course::find($id);

        return view('purchase', compact('course'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'payment_slip' => 'required|image'
        ]);

        $course = Course::find($request->course_id);

        $file = $request->file('payment_slip');

        $filename = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('payment_slips'), $filename);

        Payment::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'slip_photo' => $filename,
            'payment_date' => now(),
            'status' => 'pending',
            'amount' => $course->price,
        ]);

        return redirect()->route('student.mycourses')->with('success', 'ส่งหลักฐานแล้ว รอแอดมินอนุมัติ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
