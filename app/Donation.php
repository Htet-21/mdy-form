<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //
    public $table = "donation";
    protected $fillable = [

        'name',
        'email',
        'phone',
        'donate_id',
        'amount',
        'payment',
        'payment_method',

        ];
}
