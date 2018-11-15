<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionPostComment extends Model
{
    protected $table = "discussion_comments";
    public $primaryKey = "id";
}
