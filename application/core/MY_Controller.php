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


class Profile extends Frontend {

	public function __construct() {
		parent::__construct();

		if ( ! $this->authentification->logged_in()) {
			redirect(base_url('login'));
		}
	}

	protected function profile_redirect()
	{
		$user = $this->user->get();

		if ($this->user->is_admin()){
			die('Need relogin admin as general user');
		}

		return $user 
			? redirect(site_url($user->role_name))
			: redirect(site_url('login'));
	}
}