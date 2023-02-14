<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationTypeMm extends Model
{
    //
    public $table = "donation_type_mm";
    protected $fillable = [

        'donation_type_name',
    
        ];
}
