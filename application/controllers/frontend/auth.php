<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function construct() {
        parrent::__construct();

        
    }
    
    public function login() {
    	if ($this->input->server('REQUEST_METHOD') === 'POST') {

    		// Set validation rules
    		$this->form_validation->set_rules('login', 'Login', 'required'); //parameter, label, rule
    		$this->form_validation->set_rules('password', 'Password', 'required');
    		//--
			
			// If validation OK
			if ($this->form_validation->run()) {

				// Load Authentification model
				$this->load->model('authentification', 'auth');

				// Try to login user
				if ($this->auth->login($this->input->post('login'),$this->input->post('password'))) {
					redirect('main');
				}
			}
    	}

        $this->load->view('frontend/auth/login');
    }
    
    // $something = $this->input->post('something',$value); - через запятую ставится значение

    public function logout() {
    	// Тут можна юзнать модель без загрузки
    }

    public function forgot_password() {
    	// Тут можна юзнать модель без загрузки
    }
}


?>