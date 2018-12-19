<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
     protected $table = 'cart';   
    protected $primaryKey = 'cart_id';
    public $timestamps = false;
}
