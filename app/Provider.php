<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    public $table = "payment_provider";
    protected $fillable = [

        'provider_name',
    
        ];
}
