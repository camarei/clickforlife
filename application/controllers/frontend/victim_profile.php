<?php

class Victim_profile extends Profile {

	public function __construct() {
		parent::__construct();

		if ( ! $this->user->is_victim()){
			$this->profile_redirect();
		}		
	}

	public function index()
	{
		die('test');
	}

}