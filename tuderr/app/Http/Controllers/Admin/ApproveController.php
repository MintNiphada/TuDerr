<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Payment_approved;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
    public function show($id){
        $payment = Payment::find($id);
        $payment_approved = Payment_approved::where('payment_id', $id)->first();

        return view('admin.purchase_detail', compact('payment', 'payment_approved'));
    }

    public function store(Request $request, $id)
    {
        $status = $request->input('status');
        $payment = Payment::find($id);
        $payment->status = $status;
        $payment->save();

        $paymentApproved = Payment_approved::create([
            'approved_by' => Auth::user()->id,
            'payment_id' => $payment->id,
            'approved_date' => now(),
            'remarks' => $request->input('remarks'),
            'status' => $status,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'อนุมัติการชำระเงินเรียบร้อยแล้ว');
    }
}
