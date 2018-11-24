<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\VotingHelper;

use Auth;

class VotingController extends Controller
{
    public function create(Request $data) {
    	// Get data
    	$voting_option = $data->option;
    	$voting_poll_id = $data->voting_poll_id;

    	// Get voting helper
    	$voting_helper = new VotingHelper();
    	$voting_data = array(
    		"option" => $voting_option,
    		"voting_poll_id" => $voting_poll_id
    	);

    	// Get ID
    	$vote_id = $voting_helper->create_vote($voting_data);

    	// Return back
    	return $vote_id;
    }
}
