<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseResponse extends Model
{
    protected $table = "course_responses";
    public $primaryKey = "user_id";
}
