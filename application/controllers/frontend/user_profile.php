<?php

class User_Profile extends Frontend {

	public function __construct() {
		parent::__construct();
		
		// Load Authentification model
		$this->load->model('authentification','auth');
		$this->load->model('session_model');
		$this->load->model('');
		$this->load->helper('email');
	}

	public function index() {
		$user = $this->get_all('users');
		return $user;
	}

	$this->_view = new View_Frontend_Profile;
		// $this->_view->logged_in_user = $this->user->get($this->auth->get_uid());
		$this->render();
	}

}