<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function create(Request $data) {
    	// Get data
    	$course_title = $data->course_title;
    	$course_video_preview_link = $data->course_video_preview_link;
    	$course_description = $data->course_description;

    	// Course data for course helper
    	$course_data = array(
    		"course_title" => $course_title,
    		"course_video_preview_link" => $course_video_preview_link,
    		"course_description" => $course_description
    	);

    	// Course helper
    	$course_helper = new CourseHelper();
    	$course_id = $course_helper->create_course($course_data);

    	// Return to viewing courses
    	return redirect(url('/admin/courses/view'));
    }
}
