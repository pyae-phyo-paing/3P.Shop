<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentVoucherMail;
use App\Models\User;

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

    public function printPaidPayment($voucher)
    {
        $payments = Payment::where('voucher_no',$voucher)->where('status','Paid')->get();
        $printpayment_first = Payment::where('voucher_no',$voucher)->where('status','Paid')->first();
        return view('admin.payment.printpayment',compact('payments','printpayment_first'));
    }


    public function paymentStatus(Request $request, $voucher)
    {
        $redirectRoute = 'backend.payments';

        // Update မလုပ်ခင်မှာ $payments ကိုယူထားလို့ $payments ထဲမှာ user_id ရှိတယ်
        $payments = Payment::where('voucher_no', $voucher)->get(); 

        DB::transaction(function () use($request, $voucher, &$redirectRoute, $payments) {
            // Payment Data ကို Update
            $updatedPayments = Payment::where('voucher_no', $voucher)->get(); 

            foreach ($updatedPayments as $payment) {
                $payment->update(['status' => $request->status]);

                Order::create([
                    'voucher_no'       => $payment->voucher_no,
                    'payment_method'   => $payment->payment_method,
                    'total'            => $payment->total,
                    'qty'              => $payment->qty,
                    'discount'         => $payment->discount,
                    'price'            => $payment->price,
                    'payment_slip'     => $payment->payment_slip,
                    'status'           => 'Accept',
                    'address'          => $payment->address,
                    'note'             => $payment->note,
                    'product_size'     => $payment->product_size,
                    'category'         => $payment->category,
                    'brand'            => $payment->brand,
                    'card_number'      => $payment->card_number,
                    'card_holder_name' => $payment->card_holder_name,
                    'mobile_provider'  => $payment->mobile_provider,
                    'order_accept_date'=> Carbon::now('Asia/Yangon')->format('Y-m-d H:i:s'),
                    'product_id'       => $payment->product_id,
                    'user_id'          => $payment->user_id,
                    'payment_id'       => $payment->id
                ]);
            }

            // Payment Status ကိုစစ်မယ်
            if ($updatedPayments->contains('status', 'Checking')) {
                $redirectRoute = 'backend.payments';
            } elseif ($updatedPayments->contains('status', 'Paid')) {
                $redirectRoute = 'backend.paid-payments';

                // User ID ကို Update မလုပ်ခင်မှာ ရယူထားတဲ့ $payments မှာယူမယ်
                $userId = $payments->first()->user_id;
                $userEmail = User::find($userId)->email;

                // Payment Voucher Email ပို့မယ်
                Mail::to($userEmail)->send(new PaymentVoucherMail($updatedPayments));
            }
        });
        
        return redirect()->route($redirectRoute);
    }


}
