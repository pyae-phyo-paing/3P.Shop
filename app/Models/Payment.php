<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\PaymentStatusUpdated;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'payments';
    protected $fillable = [
        'voucher_no',
        'payment_method',
        'qty',
        'discount',
        'price',
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


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
