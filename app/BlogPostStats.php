<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPostStats extends Model
{
    protected $table = "blog_post_stats";
    public $primaryKey = "post_id";
}
