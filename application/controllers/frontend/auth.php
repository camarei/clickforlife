<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Frontend {
    
	public function __construct() {
		parent::__construct();
	}

	public function login() {

			// Set validation rules
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			//--
			
			// If validation OK
			if ($this->form_validation->run()) {
				// Try to login user
				if ($this->authentification->login($this->input->post('email'),$this->input->post('password'))) {

					// If user loggedin redirect to profile page
					redirect('profile');
				}
			}

		$this->_view = new View_Frontend_Login;
		$this->render();
    }


	public function logout() {
		$this->authentification->logout();
		redirect('main');
	}

    public function forgot_password() {
    	
    	if ($this->input->server('REQUEST_METHOD') === 'POST') {

    		// Set validation rules
    		$this->form_validation->set_rules('email','Email','required|valid_email');
    		// --
    		
    		// if validation OK
    		if ($this->form_validation->run()) {
    			
    			// get user email from db
    			if ($this->authentification->get_one_by_email($this->input->post('email'))) redirect('main');
    			
    		}
    	}

    	$this->data['meta_title'] = $this->data['meta_title'] . '|' . 'Forgot password';
    	
    	// Rendering the output
    	$this->render('frontend/auth/forgotten');
    }
    
    
}


?>