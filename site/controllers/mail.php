<?php

class Mail extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$mail = $this -> input -> post('mail', TRUE);
		$body = $this -> input -> post('body', TRUE);
		
		
		$this->load->library('email');

		$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail -t -i';

$this->email->initialize($config);


		$mail_body = 'email: '.$mail.' <br>message: '.$body;
		$this->email->from($mail, 'Site Mail');
		$this->email->to('ivajlo.sh@gmail.com'); 
		
		$this->email->subject('AUBGMUSICALS MAIL');
		$this->email->message($mail_body);	
		
		if($this->email->send()){
			echo('true');
		} else {
			echo('false');
		}
	}
}
