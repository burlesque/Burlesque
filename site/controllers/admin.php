<?php


class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
			return;
		}
		if (!$this->ion_auth->is_admin()){
			$this->session->set_flashdata('message', 'Трябват административни права!');
			redirect('auth/login');
			return;
		}
		
		$data = array();
		$data['base_url'] = $this->config->item('base_url');
		$data['settings'] = array();
		$data['settings']['languages'] = $this->config->item('languages');
		$data['settings']['admin_language'] = $this->config->item('admin_language');
		$data['image_profiles'] = array();
		$image_profiles = $this->config->item('image_profiles');
		foreach($image_profiles as $profile => $profile_data){
			if($profile_data['show_in_admin']){
				array_push($data['image_profiles'], array($profile, $profile_data['admin_name']));
			}
		}
		

		$this->load->view('admin', $data);
		
	
	}
		
}