<?php

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->output->enable_profiler(ENVIRONMENT == 'development');
	}
}