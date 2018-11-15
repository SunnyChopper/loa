<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\CourseHelper;
use App\Custom\UploadHelper;

class CoursesController extends Controller
{
    public function create(Request $data) {
        // Course helper
        $course_helper = new CourseHelper();

    	// Get data
    	$course_title = $data->course_title;
    	$course_video_preview_link = $data->course_video_preview_link;
    	$course_description = $data->course_description;
        $course_price = $data->course_price;
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
            "course_image_url" => $course_image_url,
            "course_price" => $course_price
    	);

    	// Create course
    	$course_id = $course_helper->create_course($course_data);

    	// Return to viewing courses
    	return redirect(url('/admin/courses/view'));
    }

    public function update(Request $data) {
        // Course helper
        $course_helper = new CourseHelper($data->course_id);

        // Get data
        $course_title = $data->course_title;
        $course_description = $data->course_description;
        $course_video_preview_link = $data->course_video_preview_link;
        $course_status = $data->course_status;
        $course_price = $data->course_price;

        // Check to see if image updated
        if ($data->hasFile('course_image')) {
            $update_course_image = true;
            $course_image = $data->file('course_image');

            // Upload file for course image URL
            $upload_helper = new UploadHelper();
            $file_name = "course_image." . $course_image->getClientOriginalExtension();
            $file_path = "courses/" . $data->course_id . "/" . $file_name;
            $course_image_url = $upload_helper->upload_image_to_s3($course_image, $file_path);
        } else {
            $update_course_image = false;
        }

        // Create data for course helper
        $course_data = array(
            "course_id" => $data->course_id,
            "course_title" => $course_title,
            "course_video_preview_link" => $course_video_preview_link,
            "course_description" => $course_description,
            "course_status" => $course_status,
            "course_price" => $course_price
        );

        // Check to see if need to add image
        if ($update_course_image == true) {
            $course_data["course_image_url"] = $course_image_url;
        }

        // Update course
        $course_helper->update_course($course_data);

        // Redirect to courses
        return redirect(url('/admin/courses/view'));
    }
}
