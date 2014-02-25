<?php

class MY_Controller extends CI_Controller {

	/**
	 * @var View_Site_Layout_Base  View to render
	 */
	protected $_view;

	public function __construct() {
		parent::__construct();

		$this->output->enable_profiler(ENVIRONMENT == 'development');
	}

	public function render()
	{
		echo $this->_view->render();
	}
}

class Frontend extends MY_Controller {

	public function __construct() {
		parent::__construct();

		// Load site configuration params
		$this->config->load('site');

		// Assign to the view the site name
		$this->data['meta_title'] = $this->config->item('site_name');
	}
}