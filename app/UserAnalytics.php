<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnalytics extends Model
{
    protected $table = "user_analytics";
    public $primaryKey = "user_id";
}
