<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignupStats extends Model
{
    protected $table = "signup_stats";
    public $primaryKey = "user_id";
}
