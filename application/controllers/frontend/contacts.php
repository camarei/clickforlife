<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts extends Frontend {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('authentification','auth');
		$this->load->model('user');
		$this->load->model('session_model');
		// Load Authentification model
	}
	
	
	public function index() {
		
		if($this->input->server('REQUEST_METHOD') === 'POST') {
			
			// if user not-logged
			$this->form_validation->set_rules('name','name','required|valid_name');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('message','Message','required');
			
			if($this->form_validation->run()) {
				// send a mail
			}
		}

		$this->_view = new View_Frontend_Contact;
		// $this->_view->logged_in_user = $this->user->get($this->auth->get_uid());
		$this->render();
	}
	
}

?>