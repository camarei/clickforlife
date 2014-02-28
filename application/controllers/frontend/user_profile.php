<?php

class User_profile extends Frontend {

	public function __construct() {
		parent::__construct();

		if ( ! $this->user->is_user()){
			$this->profile_redirect();
		}
	}

	public function index()
	{
		$this->_view = new View_Frontend_Profile_User;
		$this->render();
	}

}