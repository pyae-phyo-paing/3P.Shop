<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'payments';
    protected $fillable = [
        'voucher_no',
        'payment_method',
        'qty',
        'total',
        'status',
        'product_size',
        'category',
        'brand',
        'card_number', 
        'card_holder_name', 
        'mobile_provider', 
        'payment_slip',
        'address',
        'note',
        'transation_date',
        'user_id',
        'product_id',
    ];
}
