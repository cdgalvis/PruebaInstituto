<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    protected $fillable = [
        'curso','nombre','tipo','identificacion','optradio','pago'
    ];
}
