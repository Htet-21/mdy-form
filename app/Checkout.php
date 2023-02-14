<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    public $table = "prebuild_checkout_payment";
    protected $fillable = [

        'customer_name',
        'email',
        'order_id',
        'amount',
        'product_name',
        'total_amount',
        'remark',
        'transaction_status'
    
        ];
}
