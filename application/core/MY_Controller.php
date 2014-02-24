<?php

class MY_Controller extends CI_Controller {

	//@var array $data Assoc array the wi assign to view
	public $data = array();

	public function __construct() {
		parent::__construct();

		$this->output->enable_profiler(ENVIRONMENT == 'development');
	}

	public function render($template, $data = array())
	{
		$this->data['content'] = $this->load->view($template, $data, TRUE);
		//die(var_dump($data));

		$this->load->view('frontend/layout', $this->data);
	}
}