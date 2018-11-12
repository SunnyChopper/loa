<?php

namespace App\Custom;

use App\Course;
use App\CourseMembership;
use App\CourseStats;

use Auth;

class CourseHelper {
	/* Private variables */
	private $course_id;

	/* Initializers */
	public function __construct($course_id = 0) {
		$this->course_id = $course_id;
	}

	/* Public functions */
	public function create_course($data) {
		$course_title = $data["course_title"];
		$course_description = $data["course_description"];
		$course_video_preview_link = $data["course_video_preview_link"];
		$course_image_url = $data["course_image_url"];

		$course = new Course;
		$course->course_title = $course_title;
		$course->course_description = $course_description;
		$course->course_video_preview_link = $course_video_preview_link;
		$course->course_image_url = $course_image_url;
		$course->course_members = 0;
		$course->course_num_videos = 0;
		$course->is_active = 1;

		$this->course_id = $course->save();

		return $this->course_id;
	}

	public function get_all_courses() {
		return Course::where('is_active', 1)->get();
	}

	public function get_coming_soon_courses() {
		return Course::where('is_active', 1)->where('course_status', 1)->get();
	}

	public function get_published_courses() {
		return Course::where('is_active', 1)->where('course_status', 2)->get();
	}

	public function get_course_by_id($course_id = 0) {
		if ($course_id == 0) {
			$course_id = $this->course_id;
		}

		return Course::where('id', $course_id)->first();
	}

	public function get_courses_for_user($user_id) {
		// Get memberships for user
		$course_memberships = CourseMembership::where('user_id', $user_id)->get();

		// Loop through to load courses
		$courses = array();
		foreach ($course_memberships as $membership) {
			// If paid, get the course ID and load it into array
			if ($membership->paid == 1) {
				$course_id = $membership->course_id;
				$course = Course::where('id', $course_id)->first();
				array_push($courses, $course);
			}
		}

		// Return the courses
		return $courses;
	}

	public function get_views_for_course($course_id) {
		return CourseStats::where('course_id', $course_id)->first()->views;
	}

	public function get_purchased_for_course($course_id) {
		return CourseStats::where('course_id', $course_id)->first()->purchased;
	}

	public function get_guest_purchases_for_course($course_id) {
		return CourseStats::where('course_id', $course_id)->first()->guest_purchases;
	}

	public function get_member_purchases_for_course($course_id) {
		return CourseStats::where('course_id', $course_id)->first()->member_purchases;
	}

	public function get_next_course_id() {
		return (Course::count() + 1);
	}

	public function update_course($data) {
		// Get data
		$course_id = $data["course_id"];
		$course_title = $data["course_title"];
		$course_description = $data["course_description"];
		$course_video_preview_link = $data["course_video_preview_link"];
		$course_status = $data["course_status"];

		// Check to see if need to update image
		if (isset($data["course_image_url"])) {
			$update_course_image = true;
		} else {
			$update_course_image = false;
		}

		// Get course and update
		$course = Course::where('id', $course_id)->first();
		$course->course_title = $course_title;
		$course->course_description = $course_description;
		$course->course_video_preview_link = $course_video_preview_link;
		$course->course_status = $course_status;
		if ($update_course_image == true) {
			$course->course_image_url = $data["course_image_url"];
		}
		$course->save();
	}
}

?>