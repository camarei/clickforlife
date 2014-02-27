<?php

/**
* 
*/
abstract class View_Frontend_Layout extends View_Base
{
	public function logout_user() {
		return base_url('logout');
	}
}