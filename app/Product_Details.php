<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Details extends Model
{
    protected $table = 'product_details';   
    protected $primaryKey = 'pro_det_id';
    public $timestamps = false;
}
