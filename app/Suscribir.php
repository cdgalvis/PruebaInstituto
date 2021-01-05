<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suscribir extends Model
{
    protected $fillable = [
        'curso','nombre','tipo','identificacion','pago'
    ];
}
