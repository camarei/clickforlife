<?php

class Frontend_Controller extends MY_Controller {

	public function __construct() {
		parent::__construct();

		// Load site configuration params
		$this->config->load('site');

		// Assign to the view the site name
		$this->data['meta_title'] = $this->config->item('site_name');
	}
}