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
        'total',
        'qty',
        'payment_slip',
        'status',
        'address',
        'note',
        'product_size',
        'product_id',
        'user_id',
        'payment_id',
    ];
}
