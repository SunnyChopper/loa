<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotingPoll extends Model
{
    protected $table = "voting_polls";
    public $primaryKey = "id";
}
