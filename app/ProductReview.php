<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $table = "product_reviews";
    public $primaryKey = "product_id";
}
