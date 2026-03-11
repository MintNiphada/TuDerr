<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Course;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCourses = Course::count();
        $pendingPayments = Purchase::where('status','pending')->count();

        $purchases = Purchase::latest()->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCourses',
            'pendingPayments',
            'purchases'
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