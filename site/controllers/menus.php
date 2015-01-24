<?php

class Menus extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function getAllMenusJSON() {
		$data['data'] = array();
		$data['data']['children'] = $this -> menus_model -> admin_get_all_menus();
		$data['data']['success'] = true;
		$this -> load -> view('json', $data);
	}

	private function doUpdateMenuItem($data) {
		$id = $data -> id;
		$this -> db -> where('id', $data -> id);
		$data -> parent_id = $data -> parentId;
		$data -> order_num = $data -> index;
		unset($data -> id);
		unset($data -> item);
		unset($data -> parentId);
		unset($data -> leaf);
		unset($data -> index);
		unset($data -> type);
		unset($data -> iconCls);
		$this -> db -> update('menu_items', $data);
		if ($data -> parent_id == 0) {
			$data -> type = 'menu_item';
			$data -> iconCls = 'menu_item';
		} else {
			$data -> type = 'menu_button_item';
			$data -> iconCls = 'menu_button_item';
		}
		$data -> id = $id;

	}

	public function updateMenuItem() {
		$contents = json_decode(file_get_contents('php://input'));
		if (is_array($contents)) {
			for ($i = 0; $i < count($contents); $i++) {
				$this -> doUpdateMenuItem($contents[$i]);
			}
			//$contents['success'] = true;
		} else {
			$this -> doUpdateMenuItem($contents);
			$contents -> success = true;
		}

		$data = array();
		$data['data'] = array();
		$data['data']['children'] = $contents;
		$langs = $this->config->item('languages');
		foreach($langs as $lang_key => $lang_data){
			if(file_exists(APPPATH.'cache/menu_'.$lang_data['signature'])){
				unlink(APPPATH.'cache/menu_'.$lang_data['signature']);
			}
		}
		$this -> load -> view('json', $data);

	}

	private function doDeleteMenuItem($data) {
		$id = $data -> id;
		$this -> db -> where('id', $data -> id);
		$data -> parent_id = $data -> parentId;
		$data -> order_num = $data -> index;
		unset($data -> id);
		unset($data -> item);
		unset($data -> parentId);
		unset($data -> leaf);
		unset($data -> index);
		unset($data -> type);
		unset($data -> iconCls);
		$this -> db -> delete('menu_items', array('id' => $id));
		$data -> id = $id;

	}

	public function deleteMenuItem() {
		$contents = json_decode(file_get_contents('php://input'));
		if (is_array($contents)) {
			for ($i = 0; $i < count($contents); $i++) {
				$this -> doDeleteMenuItem($contents[$i]);
			}
			//$contents['success'] = true;
		} else {
			$this -> doDeleteMenuItem($contents);
			$contents -> success = true;
		}
		$data = array();
		$data['data'] = array();
		$data['data']['children'] = $contents;
		$langs = $this->config->item('languages');
		foreach($langs as $lang_key => $lang_data){
			if(file_exists(APPPATH.'cache/menu_'.$lang_data['signature'])){
				unlink(APPPATH.'cache/menu_'.$lang_data['signature']);
			}
		}
		$this -> load -> view('json', $data);

	}

	public function newMenuItem() {
		$contents = json_decode(file_get_contents('php://input'));
		if (is_array($contents)) {
			for ($i = 0; $i < count($contents); $i++) {
				$this -> doNewMenuItem($contents[$i]);
			}
		} else {
			$this -> doNewMenuItem($contents);
		}
		$contents -> success = true;
		$data = array();
		$data['data'] = array();
		$data['data']['children'] = $contents;
		$langs = $this->config->item('languages');
		foreach($langs as $lang_key => $lang_data){
			if(file_exists(APPPATH.'cache/menu_'.$lang_data['signature'])){
				unlink(APPPATH.'cache/menu_'.$lang_data['signature']);
			}
		}
		$this -> load -> view('json', $data);
	}

	private function doNewMenuItem($data) {
		$data -> parent_id = $data -> parentId;
		$data -> order_num = $data -> index;
		unset($data -> id);
		unset($data -> item);
		unset($data -> parentId);
		unset($data -> leaf);
		unset($data -> index);
		unset($data -> type);
		unset($data -> iconCls);
		$this -> db -> insert('menu_items', $data);
		$data -> id = $this -> db -> insert_id();
		if ($data -> parent_id == 0) {
			$data -> type = 'menu_item';
			$data -> iconCls = 'menu_item';
		} else {
			$data -> type = 'menu_button_item';
			$data -> iconCls = 'menu_button_item';
		}
	}

}
