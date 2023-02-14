<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    //
    public $table = "payment_method";
    protected $fillable = [

        'method_name',
    
        ];
}
