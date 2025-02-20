<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function orderList()
    {
        $orders = Order::where('status','Complete')->with(['user'])->get()->unique('voucher_no');
        return view('admin.dashboard.order-complete-list', compact('orders'));
    }

    public function paymentList()
    {
        $payments = Payment::where('status','Paid')->with(['user'])->get()->unique('voucher_no');
        return view('admin.dashboard.payment-paid-list',compact('payments'));
    }

    public function instockList()
    {
        $products = Product::orderBy('instock', 'asc')->get()->unique('name');
        return view('admin.dashboard.product-instock-list',compact('products'));
    }
    
}
