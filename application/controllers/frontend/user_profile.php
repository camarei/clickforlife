<?php

class User_Profile extends Frontend {

	public function __construct() {
		parent::__construct();

		// Load Authentification model
		$this->load->model('authentification','auth');
		$this->load->model('session_model');
		$this->load->helper('email');
	}

	public function info() {
		$user = $this->get_all('id','users');
	}

}