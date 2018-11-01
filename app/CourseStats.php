<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStats extends Model
{
    protected $table = "course_stats";
    public $primaryKey = "course_id";
}
