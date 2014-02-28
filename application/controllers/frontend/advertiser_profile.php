<?php

class Advertiser_profile extends Profile {

	public function __construct() {
		parent::__construct();

		if ( ! $this->user->is_advertiser()){
			$this->profile_redirect();
		}
	}

	public function index()
	{
		die('test');
	}

}