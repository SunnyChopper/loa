<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToolMembership extends Model
{
    protected $table = "tool_memberships";
    public $primaryKey = "user_id";
}
