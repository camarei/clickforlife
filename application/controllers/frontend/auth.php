<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function construct() {
        parrent::__construct();
    }
    
    public function login() {
        $this->load->model('auth');
        $this->load->helper(array('form'));
        $this->load->view('login');
    }
}


?>