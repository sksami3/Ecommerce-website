<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';   
    protected $primaryKey = 'supp_id';
    //public $timestamps = false;
}
