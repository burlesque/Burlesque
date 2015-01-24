<?php
class Languages_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getLanguages(){
		return $this->config->item('languages');
	}
	
	public function getAdminLanguage(){
		return $this->config->item('admin_language');
	}


    
	
}