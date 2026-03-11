<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Course;
use App\Models\Payment;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCourses = Course::count();
        $pendingPayments = Payment::where('status','pending')->count();

        $payments = Payment::latest()->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCourses',
            'pendingPayments',
            'payments'
        ));
    }

    public function approve($id)
    {
        $purchase = Purchase::find($id);
        $purchase->status = 'approved';
        $purchase->save();
        
        return redirect('/admin/dashboard');
    }

    public function reject($id)
    {
        $purchase = Purchase::find($id);
        $purchase->status = 'rejected';
        $purchase->save();
        
        return redirect('/admin/dashboard');
    }

    public function purchaseDetail($id)
    {
        $purchase = Purchase::find($id);

        return view('admin.purchase_detail', compact('purchase'));
    }
}