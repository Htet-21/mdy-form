<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    //
    public $table = "callback_data";
    protected $fillable = [

        'totalAmount',
        'transactionStatus',
        'methodName',
        'merchantOrderId',
        'transactionId',
        'customerName',
        'providerName',

        ];
}
