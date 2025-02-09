<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'orders';
    protected $fillable = [
        'voucher_no',
        'payment_method',
        'total',
        'qty',
        'payment_slip',
        'status',
        'address',
        'note',
        'product_size',
        'category',
        'brand',
        'card_number',
        'card_holder_name',
        'mobile_provider',
        'order_accept_date',
        'order_shipping_date',
        'order_complete_date',
        'product_id',
        'user_id',
        'payment_id',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
