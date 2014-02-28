<?php

/**
* 
*/
abstract class View_Frontend_Layout extends View_Base
{
	public function logout_user() {
		return base_url('logout');
	}

	public function register_user_button_url() {
		return base_url('registration/method');
	}

	public function forgot_password_url() {
		return base_url('forgot');
	}

}