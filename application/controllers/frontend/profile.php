<?php

class User_Profile extends Frontend {

	public function __construct() {
		parent::__construct();
		$this->load->helper('email');
	}

	public function index() {
		$user = $this->get_all('users');
		return $user;
	}

	$this->_view = new View_Frontend_Profile;
		$this->render();
	}

}