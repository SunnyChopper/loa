<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventStats extends Model
{
    protected $table = "event_stats";
    public $primaryKey = "event_id";
}
