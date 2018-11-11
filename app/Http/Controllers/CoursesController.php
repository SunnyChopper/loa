<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\CourseHelper;

class CoursesController extends Controller
{
    public function create(Request $data) {
        // Course helper
        $course_helper = new CourseHelper();

    	// Get data
    	$course_title = $data->course_title;
    	$course_video_preview_link = $data->course_video_preview_link;
    	$course_description = $data->course_description;
        $course_image = $data->file('course_image');

        // Upload image for course image URL
        $upload_helper = new UploadHelper();
        $file_name = "course_image." . $course_image->getClientOriginalExtension();
        $file_path = "courses/" . $course_helper->get_next_course_id() . "/" . $file_name;
        $course_image_url = $upload_helper->upload_image_to_s3($course_image, $file_path);

    	// Course data for course helper
    	$course_data = array(
    		"course_title" => $course_title,
    		"course_video_preview_link" => $course_video_preview_link,
    		"course_description" => $course_description,
            "course_image_url" => $course_image_url
    	);

    	// Create course
    	$course_id = $course_helper->create_course($course_data);

    	// Return to viewing courses
    	return redirect(url('/admin/courses/view'));
    }
}
