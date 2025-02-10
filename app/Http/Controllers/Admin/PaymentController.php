<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        return view('admin.payment.index',compact('payment_data'));
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
        DB::transaction(function () use($request,$voucher) {
            //Payment Data ကို Update (status = 'Paid' ပြောင်းမယ်)
            $payment = Payment::where('voucher_no', $voucher)->firstOrFail();
            $payment->status = $request->status;
            $payment->save();
            
            // Order Table ထဲကို Data ကို Create လုပ်မယ်

            Order::create([
                'voucher_no' =>$payment->voucher_no,
                'payment_method' => $payment->payment_method,
                'total' => $payment->total,
                'qty' => $payment->qty,
                'payment_slip' => $payment->payment_slip,
                'status' => 'Accept',
                'address' => $payment->address,
                'note' => $payment->note,
                'product_size' => $payment->product_size,
                'category' => $payment->category,
                'brand' => $payment->brand,
                'card_number' => $payment->card_number,
                'card_holder_name' => $payment->card_holder_name,
                'mobile_provider' => $payment->mobile_provider,
                'order_accept_date' => Carbon::now('Asia/Yangon')->format('Y-m-d H:i:s'),
                'product_id' => $payment->product_id,
                'user_id' => $payment->user_id,
                'payment_id' => $payment->id
            ]);
        });
        return redirect()->route('backend.payments');
    }
}
