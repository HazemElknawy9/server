<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
     'affiliate_id','order_id','transfer_method','transfer_date','transfer_amount'
    ];
}
