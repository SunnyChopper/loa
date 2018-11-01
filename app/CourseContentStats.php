<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseContentStats extends Model
{
    protected $table = "course_content_stats";
    public $primaryKey = "content_id";
}
