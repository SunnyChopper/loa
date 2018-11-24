<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\VotingHelper;

use Auth;

class VotingController extends Controller
{
    public function create_vote(Request $data) {
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

    public function create_voting_poll(Request $data) {
        // Get data
        $start_date = $data->start_date;
        $end_date = $data->end_date;
        $option_1 = $data->option_1;
        $option_1_description = $data->option_1_description;
        $option_2 = $data->option_2;
        $option_2_description = $data->option_2_description;
        $option_3 = $data->option_3;
        $option_3_description = $data->option_3_description;
        $option_4 = $data->option_4;
        $option_4_description = $data->option_4_description;

        // Create voting helper and data
        $voting_helper = new VotingHelper();
        $voting_data = array(
            "start_date" => $start_date,
            "end_date" => $end_date,
            "option_1" => $option_1,
            "option_1_description" => $option_1_description,
            "option_2" => $option_2,
            "option_2_description" => $option_2_description,
            "option_3" => $option_3,
            "option_3_description" => $option_3_description,
            "option_4" => $option_4,
            "option_4_description" => $option_4_description
        );
        $voting_helper->create_voting_poll($voting_data);

        // Redirect to main page
        return redirect(url('/admin/voting/view'));
    }

    public function delete_voting_poll(Request $data) {
        // Get data
        $voting_poll_id = $data->voting_poll_id;

        // Delete
        $voting_helper = new VotingHelper();
        $voting_helper->delete_voting_poll($voting_poll_id);

        // Redirect to main page
        return redirect(url('/admin/voting/view'));    
    }
}
