<?php

class Content extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function content_type_admin_ui_json() {
		$data = array();
		$data['data'] = $this -> content_model -> get_content_type_admin_ui($this -> input -> post('type', TRUE));
		$this -> load -> view('json', $data);
	}

	public function read_content_json() {
		$data = array();
		$contents = $this -> content_model -> get_contents_of_type($this -> input -> get('type', TRUE),$this -> input -> get('sort', TRUE), $this -> input -> get('start', TRUE), $this -> input -> get('limit', TRUE));
		$data['data']['content'] = $contents[0];
		$data['data']['total'] = $contents[1];
		$data['data']['success'] = true;
		$this -> load -> view('json', $data);
	}
	
	public function content_autocomplete() {
		$data = array();
		$data['data']['content'] = $this -> content_model -> get_contents_autocomplete($this -> input -> get('content_title', TRUE), $this -> input -> get('allowed_types', TRUE));
		$data['data']['success'] = true;
		$this -> load -> view('json', $data);
	}
	
	public function create_content_json() {

		$contents = json_decode(file_get_contents('php://input'));
		if (is_array($contents)) {
			for ($i = 0; $i < count($contents); $i++) {
				$this -> doCreateContentItem($contents[$i]);
			}
		} else {
			$this -> doCreateContentItem($contents);
			$contents -> success = true;
		}

		$data = array();
		$data['data'] = array();
		$data['data']['content'] = $contents;
		$this -> load -> view('json', $data);
	}

	private function doCreateContentItem($data) {
		$data -> order_num = $data -> index;
		if($data -> date == ""){
			$data -> date = date("c", time());
		}
		$data -> last_edit_date = date("c", time());
		$fields_data = $data -> fields_data;
		unset($data -> id);
		unset($data -> name);
		unset($data -> index);
		unset($data -> system);
		unset($data -> fields_data);
		$content_types = $this -> config -> item('content_types');
		$data -> url_field = $content_types[$data -> content_type]['url_field'];
		if ($this -> db -> insert('content', $data)) {
			$data -> id = $this -> db -> insert_id();
			$fields_data_insert = array();
			foreach ($fields_data as $field_name => $value) {
				array_push($fields_data_insert, array('content_id' => $data -> id, 'field' => $field_name, 'data' => $value));
			}

			$this -> db -> insert_batch('fields_data', $fields_data_insert);
		}
	}

	public function update_content_json() {

		$contents = json_decode(file_get_contents('php://input'));
		if (is_array($contents)) {
			for ($i = 0; $i < count($contents); $i++) {
				$this -> doUpdateContentItem($contents[$i]);
			}
		} else {
			$this -> doUpdateContentItem($contents);
			$contents -> success = true;
		}

		$data = array();
		$data['data'] = array();
		$data['data']['content'] = $contents;
		$this -> load -> view('json', $data);
	}

	private function doUpdateContentItem($data) {
		$data -> order_num = $data -> index;
		$data -> last_edit_date = date("c", time());
		$fields_data = $data -> fields_data;
		$id = $data -> id;
		//unset($data -> id);
		unset($data -> name);
		unset($data -> index);
		unset($data -> system);
		unset($data -> fields_data);

		if ($this -> db -> update('content', $data, array('id' => $id))) {
			if($fields_data){
			$fields_data_update = array();
			foreach ($fields_data as $field_name => $value) {
				$this -> db -> where(array('content_id' => $id, 'field' => $field_name));
				if (!$this -> db -> update('fields_data', array('data' => $value))) {
					return false;
				}
			}
			}
		}
		return true;
	}
	
	
	
	public function reorder_content_json() {

		$contents = json_decode(file_get_contents('php://input'));
		if (is_array($contents)) {
			for ($i = 0; $i < count($contents); $i++) {
				$this -> doReorderContentItem($contents[$i]);
			}
		} else {
			$this -> doReorderContentItem($contents);
			$contents -> success = true;
		}

		$data = array();
		$data['data'] = array();
		$data['data']['content'] = $contents;
		$this -> load -> view('json', $data);
	}

	private function doReorderContentItem($data) {
		$id = $data -> id;
		unset($data -> id);
		$this -> db -> update('content', $data, array('id' => $id));
	}
	
	
	
	public function delete_content_json() {

		$contents = json_decode(file_get_contents('php://input'));
		if (is_array($contents)) {
			for ($i = 0; $i < count($contents); $i++) {
				$this -> doDeleteContentItem($contents[$i]);
			}
		} else {
			$this -> doDeleteContentItem($contents);
			$contents -> success = true;
		}

		$data = array();
		$data['data'] = array();
		$data['data']['content'] = $contents;
		$this -> load -> view('json', $data);
	}

	private function doDeleteContentItem($data) {
		$data -> order_num = $data -> index;
		//$data->date = date("Y/m/d H:i:s", time());
		$data -> last_edit_date = date("c", time());
		$fields_data = $data -> fields_data;
		$id = $data -> id;
		unset($data -> id);
		unset($data -> name);
		unset($data -> index);
		unset($data -> system);
		unset($data -> fields_data);

		if ($this -> db -> delete('content', array('id' => $id))) {
			if (!$this -> db -> delete('fields_data', array('content_id' => $id))) {
				return false;
			}
		} else {
			return false;
		}
		return true;
	}

	private function deleteUploadedFile($content_id, $field_name) {
		$this -> load -> helper('file');
		$file_name = $this -> content_model -> get_custom_field_item($content_id, $field_name);
		if (substr(get_mime_by_extension($file_name), 0, 6) == 'image/') {
			if ($this -> doImageDelete($file_name)) {
				$this -> db -> where(array('content_id' => $content_id, 'field' => $field_name));
				if ($this -> db -> update('fields_data', array('data' => ''))) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			if ($this -> doFileDelete($file_name)) {
				$this -> db -> where(array('content_id' => $content_id, 'field' => $field_name));
				if ($this -> db -> update('fields_data', array('data' => ''))) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}
	}

	private function doFileDelete($file_name) {
		$path = './application/files/files/';
		if (file_exists($path . $file_name) && !is_dir($path . $file_name)) {
			if (!unlink($path . $file_name)) {
				return false;
			}
		} else {
			return false;
		}
		return true;
	}

	private function doImageDelete($file_name) {
		$path = './application/files/images/';
		$image_profiles = $this -> config -> item('image_profiles');
		foreach ($image_profiles as $profile => $profile_values) {
			if (file_exists($path . $profile . '/' . $file_name)) {
				if (!unlink($path . $profile . '/' . $file_name)) {
					return false;
				}
			}
		}
		if (file_exists($path . 'original/' . $file_name)) {
			if (!unlink($path . 'original/' . $file_name)) {
				return false;
			}
		} else {
			return false;
		}
		return true;
	}

	public function get_content_title() {
		$data = array();
		$data['data']['content'] = $this -> content_model -> get_content_title($this -> input -> post('id', TRUE));
		$data['data']['success'] = true;
		$this -> load -> view('json', $data);
	}

	public function getContentItemJson() {
		$data = array();
		$data['data']['content'] = $this -> content_model -> get_content_item($this -> input -> post('id', TRUE));
		$data['data']['success'] = true;
		$this -> load -> view('json', $data);
	}

	public function content_types_names_json() {
		$data = array();
		$data['data']['content'] = $this -> content_model -> get_content_types_names();
		$data['data']['success'] = true;
		$this -> load -> view('json', $data);
	}

	public function all_images_json() {
		$data = array();
		$data['data']['content'] = $this -> content_model -> get_content_types_names();
		$data['data']['success'] = true;
		$this -> load -> view('json', $data);
	}

	public function upload_file_field() {
		$this -> load -> library('upload');
		$errors = array();
		$uploadedfiles = array();
		foreach ($_FILES as $fieldname => $fieldvalue) {
			$folder = $this -> input -> get($fieldname . '_folder', TRUE);
			if (substr($fieldvalue['type'], 0, 6) == 'image/') {
				$config['upload_path'] = './application/files/images/original/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['remove_spaces'] = true;
				$config['file_name'] = $folder . '@' . $fieldname . '_' . $fieldvalue['name'];
			} else {
				$config['upload_path'] = './application/files/files/';
				$config['allowed_types'] = '*';
				$config['remove_spaces'] = true;
				$config['file_name'] = $folder . '@' . $fieldname . '_' . $fieldvalue['name'];
			}
			$this -> upload -> initialize($config);
			if ($this -> upload -> do_upload($fieldname)) {
				$content_id = $this -> input -> get('content_id', TRUE);
				if ($content_id != 'new') {
					$this -> deleteUploadedFile($content_id, $fieldname);
				}
				$filedata = $this -> upload -> data();
				$filedata['field_name'] = $fieldname;
				array_push($uploadedfiles, $filedata);
			} else {
				array_push($errors, 'Файлът ' . $fieldvalue['name'] . ' не може да бъде записан!<br>ГРЕШКА: ' . $this -> upload -> display_errors() . '<br>');
			}
		}

		$data = array();
		if (count($errors) > 0) {

			$data['data']['success'] = false;
			$data['data']['error'] = implode(", ", $errors);
		} else {
			$data['data']['success'] = true;
			$data['data']['files'] = $uploadedfiles;
		}
		$this -> load -> view('json', $data);

	}

}
