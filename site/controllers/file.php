<?php

class File extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$file = $this -> input -> get('file', TRUE);
		if ($file) {
			$file_name = './files/' . $file;
			$image_extension = end(explode(".", $file));
			$this -> output -> set_content_type($image_extension) -> set_output(file_get_contents($file_name));
		}
	}
}
