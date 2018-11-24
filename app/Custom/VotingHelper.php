<?php

namespace App\Custom;

use App\VotingPoll;
use App\Vote;

use Illuminate\Support\Carbon;

use Auth;

class VotingHelper {
	/* Private variables */
	private $vote_id;

	/* Initializers */
	public function __construct($vote_id = 0) {
		$this->vote_id = $vote_id;
	}

	/* Public functions */
	public function create_vote($data) {
		// Get data
		$voting_poll_id = $data["voting_poll_id"];
		$option = $data["option"];

		// Get User ID
		$user_id = Auth::id();

		// Create vote
		$vote = new Vote;
		$vote->voting_poll_id = $voting_poll_id;
		$vote->option = $option;
		$vote->user_id = $user_id;
		$vote->save();

		// Update voting poll results
		$voting_poll = VotingPoll::where('id', $voting_poll_id)->first();
		switch(intval($option)) {
			case 1:
				$voting_poll->voting_option_1_votes = $voting_poll->voting_option_1_votes + 1;
				break;
			case 2:
				$voting_poll->voting_option_2_votes = $voting_poll->voting_option_2_votes + 1;
				break;
			case 3:
				$voting_poll->voting_option_3_votes = $voting_poll->voting_option_3_votes + 1;
				break;
			case 4:
				$voting_poll->voting_option_4_votes = $voting_poll->voting_option_4_votes + 1;
				break;
			default:
				break;
		}
		$voting_poll->save();

		return $vote->id;
	}

	public function create_voting_poll($data) {
		// Get data
		$start_date = $data["start_date"];
		$end_date = $data["end_date"];
		$option_1_vote = $data["option_1"];
		$option_1_description = $data["option_1_description"];
		$option_2_vote = $data["option_2"];
		$option_2_description = $data["option_2_description"];
		$option_3_vote = $data["option_3"];
		$option_3_description = $data["option_3_description"];
		$option_4_vote = $data["option_4"];
		$option_4_description = $data["option_4_description"];

		// Create voting poll
		$voting_poll = new VotingPoll;
		$voting_poll->start_date = $start_date;
		$voting_poll->end_date = $end_date;
		$voting_poll->voting_option_1_vote = $option_1_vote;
		$voting_poll->voting_option_1_description = $option_1_description;
		$voting_poll->voting_option_1_votes = 0;
		$voting_poll->voting_option_2_vote = $option_2_vote;
		$voting_poll->voting_option_2_description = $option_2_description;
		$voting_poll->voting_option_2_votes = 0;
		$voting_poll->voting_option_3_vote = $option_3_vote;
		$voting_poll->voting_option_3_description = $option_3_description;
		$voting_poll->voting_option_3_votes = 0;
		$voting_poll->voting_option_4_vote = $option_4_vote;
		$voting_poll->voting_option_4_description = $option_4_description;
		$voting_poll->voting_option_4_votes = 0;
		$voting_poll->save();

		return $voting_poll->id;
	}

	public function does_voting_poll_exist() {
		// Check to see if any active voting polls
		if (VotingPoll::where('start_date', '<=', Carbon::now())->where('end_date', '>', Carbon::now())->where('is_active', 1)->count() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function has_user_voted() {
		// Get User ID
		$user_id = Auth::id();

		// Get current voting poll
		$voting_poll = $this->get_current_voting_poll();
		$voting_poll_id = $voting_poll->id;

		// Check
		if (Vote::where('voting_poll_id', $voting_poll_id)->where('user_id', $user_id)->count() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_user_vote() {
		// Get User ID
		$user_id = Auth::id();

		// Return the vote
		return Vote::where('voting_poll_id', $voting_poll_id)->where('user_id', $user_id)->first();
	}

	public function get_poll() {
		return $this->get_current_voting_poll();
	}

	public function get_all_polls() {
		return VotingPoll::where('is_active', 1)->get();
	}

	public function delete_voting_poll($voting_poll_id) {
		$poll = VotingPoll::where('id', $voting_poll_id)->first();
		$poll->is_active = 0;
		$poll->save();
	}

	/* Private functions */
	private function get_current_voting_poll() {
		return VotingPoll::where('start_date', '<=', Carbon::now())->where('end_date', '>', Carbon::now())->where('is_active', 1)->first();
	}
}

?>