<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function construct() {
        parrent::__construct();

        
    }
    
    public function login() {
    	if ($this->input->server('REQUEST_METHOD') === 'POST') {
    		$this->load->model('authentification');
    		
    		$this->form_validation->set_rules(array(
					'login'		=>	"required", 
					'password'	=>	"required"
				));
				
			if ($this->form_validation->run()) {
				
				$user = $this->authentification->login($this->input->post('login'),$this->input->post('password'));
				if($user) {
					redirect('main');
				} else {
    					
				}
				
			}
			
    		
    		
    		// Тут можна юзнать модель без загрузки

    		// Вызов модели, отправка параметров в модель, если нашли юзера то делаем редирект на главную
    		// Если нет то выводим ошибки
    	}
 
        $this->load->helper(array('form'));
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