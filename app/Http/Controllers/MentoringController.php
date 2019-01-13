<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

use App\Notifications\NewMentee;
use App\Notifications\NewPayment;

use App\MentoringMember;

use Notification;

class MentoringController extends Controller
{
    public function checkout(Request $data) {
    	// Start by creating a charge
		$stripe = Stripe::make(env('STRIPE_SECRET_DEV'));

		try {
			// Create the token
			$token = $stripe->tokens()->create([
				'card' => [
					'number'    => $data->cc_number,
					'exp_month' => $data->ccExpiryMonth,
					'exp_year'  => $data->ccExpiryYear,
					'cvc'       => $data->cvvNumber
				]
			]);

			if (!isset($token['id'])) {
				\Session::put('error','The Stripe Token was not generated correctly');
				return redirect()->back();
			}

			// Create a customer
			$customer = $stripe->customers()->create([
				"email" => $data->email,
				"metadata" => array(
					"First Name" => $data->first_name,
					"Last Name" => $data->last_name
				)
			]);

			// Create a card for customer
			$card = $stripe->cards()->create($customer["id"], $token["id"]);

			// Check which subscription
			if ($data->fid == "loa-a") {
				$plan_id = "close-friends";
				$group = "Close Friends List";
				$total = 1000;
			} elseif ($data->fid == "loa-b") {
				$plan_id = "vip-group";
				$group = "VIP Mastermind Group";
				$total = 5000;
			}

			$subscription = $stripe->subscriptions()->create($customer["id"], [
				'plan' => $plan_id
			]);

			if($subscription['status'] == 'active') {
				// Store in database
				$mentoring_member = new MentoringMember;
				$mentoring_member->first_name = $data->first_name;
				$mentoring_member->last_name = $data->last_name;
				$mentoring_member->email = $data->email;
				$mentoring_member->group = $group;
				$mentoring_member->customer_id = $customer["id"];
				$mentoring_member->subscription_id = $subscription["id"];
				$mentoring_member->next_payment_date = date('Y-m-d', strtotime('+1 year'));
				$mentoring_member->save();

				// Send them a notification email
				Notification::route('mail', $data->email)->notify(new NewMentee(array("first_name" => $data->first_name, "last_name" => $data->last_name, "plan_name" => $group)));

				// Send Luis notification email
				Notification::route('mail', env('MAIL_USERNAME'))->notify(new NewPayment(array("first_name" => $data->first_name, "last_name" => $data->last_name, "email" => $data->email, "total" => $total, "item" => $group)));

				return redirect(url('/mentoring/thank-you'));
			} else {
				return "Error while creating subscription.";
			}
		} catch (Exception $e) {
			return $e->getMessage();
		} catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
			return $e->getMessage();
		} catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
			return $e->getMessage();
		}
    }

    public function thank_you() {
    	$page_header = "Thank You";
    	$page_title = $page_header;

    	return view('pages.thank-you-mentoring')->with('page_header', $page_header)->with('page_title', $page_title);
    }
}
