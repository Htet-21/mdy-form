<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationType extends Model
{
    //
    public $table = "donation_type";
    protected $fillable = [

        'donation_type_name',
    
        ];
}
