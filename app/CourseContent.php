<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $table = "course_content";
    public $primaryKey = "course_id";
}
