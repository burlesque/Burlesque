<?php

class Image extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$image_profiles = $this -> config -> item('image_profiles');
		$image_profile = $this -> input -> get('profile', TRUE);
		if (!$image_profile) {
			$image_profile = 'original';
		}
		$image_path = $this -> input -> get('file', TRUE);
		$image_extension = end(explode(".", $image_path));
		if (!$image_path) {
			return;
		}
		if ($image_profile == 'original') {
			$file_name = './files/' . $image_path;
		} else {
			if (array_key_exists($image_profile, $image_profiles)) {
				$file_name = './cache/' . md5($image_path . '_' . $image_profile).'.'.$image_extension;

				if (!file_exists($file_name)) {
					$config['image_library'] = 'gd2';
					$config['source_image'] = './files/' . $image_path;
					$config['maintain_ratio'] = $image_profiles[$image_profile]['maintain_ratio'];
					$config['width'] = $image_profiles[$image_profile]['width'];
					$config['height'] = $image_profiles[$image_profile]['height'];
					$config['quality'] = $image_profiles[$image_profile]['quality'];
					$config['new_image'] = $file_name;

					$this -> load -> library('image_lib', $config);
					if($image_profiles[$image_profile]['fit']){
						if (!$this -> image_lib -> fit()) {
							echo $this -> image_lib -> display_errors();
						}
					} else {
						if (!$this -> image_lib -> resize()) {
							echo $this -> image_lib -> display_errors();
						}
					}
				}
			}
		}
		header('Location: ' . $file_name);
		//$this -> output -> set_content_type($image_extension) -> set_output(file_get_contents($file_name));
	}
}
