<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function construct() {
        parrent::__construct();

        $this->load->model('authentication');
    }
    
    public function login() {
    	if ($this->input->server('REQUEST_METHOD') === 'POST') {
    		// Тут можна юзнать модель без загрузки

    		// Вызов модели, отправка параметров в модель, если нашли юзера то делаем редирект на главную
    		// Если нет то выводим ошибки
    	}
 
        $this->load->helper(array('form'));
        $this->load->view('frontend/auth/login');
    }

    public function logout() {
    	// Тут можна юзнать модель без загрузки
    }

    public function forgot_password() {
    	// Тут можна юзнать модель без загрузки
    }
}


?>