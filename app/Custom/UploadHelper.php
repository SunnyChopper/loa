<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;

class UploadHelper {

	/* Public functions */
	public function upload_image_to_s3($image, $file_path) {
		$s3 = \Storage::disk('s3');
		$s3->put($file_path, file_get_contents($image), 'public');
		return \Storage::disk('s3')->url($file_path);
	}

}

?>