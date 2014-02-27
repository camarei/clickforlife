<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Frontend {
	
	public function __construct() {
		parent::__construct();

		// Load Authentification model
		$this->load->helper('email');
	}

	public function registration($role) {

		// Detect register method of user
		$register_function = 'register_'.$role;

		return $this->$register_function();
	}

	public function registration_method() {
		$this->_view = new View_Frontend_Registration_Method;
		$this->render();
	}

	private function register_user() {
		die('user');
	}

	private function register_victim() {
		die('victim');
	}

	private function register_client() {
		die('client');
	}
	
}

?>