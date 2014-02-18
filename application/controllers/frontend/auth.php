<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Frontend_Controller {
    
	public function __construct() {
		parent::__construct();

		// Load Authentification model
		$this->load->model('authentification','auth');
		$this->load->model('session_model');
		$this->load->helper('email');
	}

	public function login() {
    	if ($this->input->server('REQUEST_METHOD') === 'POST') {

			// Set validation rules
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			//--
			
			// If validation OK
			if ($this->form_validation->run()) {
				// Try to login user
				if ($this->auth->login($this->input->post('email'),$this->input->post('password'))) {
					redirect('main');
				}
			}
		}
die(var_dump($this->auth->get_uid()));
		if ($this->auth->get_uid()) redirect('main');

        $this->load->view('frontend/auth/login');
    }
    
    // $something = $this->input->post('something',$value); - через запятую ставится значение

	public function logout() {
		$this->auth->logout();
		redirect('main');
	}

    public function forgot_password() {
    	
    	
    	// Тут можна юзнать модель без загрузки
    }
}


?>