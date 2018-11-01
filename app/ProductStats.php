<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductStats extends Model
{
    protected $table = "product_stats";
    public $primaryKey = "product_id";
}
