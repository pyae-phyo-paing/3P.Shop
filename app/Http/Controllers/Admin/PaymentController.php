<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payments()
    {
        $payments = Payment::all();
        // dd($payments);

        $voucher_group = $payments->groupBy('voucher_no')->toArray(); //voucher number တူတာတွေကို group ဖွဲ့ပြီး array ပြောင်း
        // dd($voucher_group);

        $payment_data = [];
        foreach($voucher_group as $voucher){
            $payment_id = array_column($voucher,'id'); //voucher array ထဲမှာ ရှိတဲ့ payment id ေတွကို ယူတာ
           
            $payment_data[] = Payment::whereIn('id',$payment_id)->where('status','Checking')->first();
        }

        return view('admin.payment.index',compact('payment_data'));
    }

    public function paidPayments()
    {
        $payments = Payment::all();
        $voucher_group = $payments->groupBy('voucher_no')->toArray();
        $payment_data = [];
        foreach($voucher_group as $voucher){
            $payment_id = array_column($voucher,'id');
            $payment_data[] = Payment::whereIn('id',$payment_id)->where('status','Paid')->first();
        }
        return view('admin.payment.index',compact('payment-data'));
    }

    public function detailPayment($voucher)
    {
        $payments = Payment::where('voucher_no',$voucher)->get();
        $first_payment = Payment::where('voucher_no',$voucher)->first();
        return view('admin.payment.detail',compact('payments','first_payment'));
    }

    public function paymentStatus(Request $request, $voucher)
    {
        // dd($request);
        Payment::where('voucher_no',$voucher)->update(['status' => $request->status]);
        return redirect()->route('backend.payments');
    }
}
