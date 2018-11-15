<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionPost extends Model
{
    protected $table = "book_discussion_posts";
    public $primaryKey = "id";
}
