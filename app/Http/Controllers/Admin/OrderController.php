<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orders()
    {
        $orders = Order::all();

        $voucher_group = $orders->groupBy('voucher_no')->toArray();
        $order_data = [];
        foreach ($voucher_group as $voucher){
            $order_id = array_column($voucher,'id');
            $order_data[] = Order::whereIn('id',$order_id)->where('status','Accept')->first();
        }
        return view('admin.order.index',compact('order_data'));
    }

    public function orderShipping()
    {
        $orders = Order::all();

        $voucher_group = $orders->groupBy('voucher_no')->toArray();
        $order_data = [];
        foreach($voucher_group as $voucher)
        {
            $order_id = array_column($voucher,'id');
            $order_data[] = Order::whereIn('id',$order_id)->where('status','Shipping')->first();
        }
        return view('admin.order.index',compact('order_data'));
    }

    public function orderComplete()
    {
        $orders = Order::all();

        $voucher_group = $orders->groupBy('voucher_no')->toArray();
        $order_data = [];
        foreach($voucher_group as $voucher)
        {
            $order_id = array_column($voucher,'id');
            $order_data[] = Order::whereIn('id',$order_id)->where('status','Complete')->first();
        }
        return view('admin.order.index',compact('order_data'));
    }

    public function detailOrder($voucher)
    {
        $orders = Order::where('voucher_no',$voucher)->get();
        $first_order = Order::where('voucher_no',$voucher)->first();
        return view('admin.order.detail',compact('orders','first_order'));
    }

    public function orderStatus(Request $request, $voucher)
    {
        // dd($voucher);
        $redirectRoute = 'backend.orders';
        DB::transaction(function () use($request,$voucher, &$redirectRoute) {
            $order = Order::where('voucher_no', $voucher)->firstOrFail();
            $order->status = $request->status;

            if ($order->status == 'Shipping') {
                $order->order_shipping_date = Carbon::now('Asia/Yangon')->format('Y-m-d H:i:s');
                $redirectRoute = 'backend.order-shipping';
            } elseif ($order->status == 'Complete') {
                $order->order_complete_date = Carbon::now('Asia/Yangon')->format('Y-m-d H:i:s');
                $redirectRoute = 'backend.order-complete';
            }

            $order->save();

        });
        return redirect()->route($redirectRoute);
    }
}
