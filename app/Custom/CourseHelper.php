<?php

namespace App\Custom;

use App\Course;
use App\CourseMembership;

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

		$course = new Course;
		$course->course_title = $course_title;
		$course->course_description = $course_description;
		$course->course_video_preview_link = $course_video_preview_link;
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
}

?>