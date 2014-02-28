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
		die('test');
	}

}