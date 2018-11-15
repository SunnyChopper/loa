<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionPostLike extends Model
{
    protected $table = "discussion_post_likes";
    public $primaryKey = "id";
}
