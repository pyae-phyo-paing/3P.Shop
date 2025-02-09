<?php

namespace App\Observers;
use Carbon\Carbon;
use App\Models\Order;

use App\Models\Payment;

class PaymentObserver
{
    /**
     * Handle the Payment "created" event.
     */
    public function created(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "updated" event.
     */
    public function updated(Payment $payment)
    {
        if($payment->status == 'Paid'){

            if($payment->payment_slip){
                $file_name = time().'.'.$payment->payment_slip->extension();
                $upload = $payment->payment_slip->move(public_path('images/payment_slips/'),$file_name);
            }else{
                $file_name = null;
            }
            // Order မှာ Data ကို Create လုပ်မယ်
            Order::create([
                'voucher_no' => $payment->voucher_no,
                'payment_method' => $payment->payment_method,
                'total' => $payment->total,
                'qty' => $payment->qty,
                'payment_slip' => "/images/payment_slips".$file_name,
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
        }
    }

    /**
     * Handle the Payment "deleted" event.
     */
    public function deleted(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "restored" event.
     */
    public function restored(Payment $payment): void
    {
        //
    }

    /**
     * Handle the Payment "force deleted" event.
     */
    public function forceDeleted(Payment $payment): void
    {
        //
    }
}
