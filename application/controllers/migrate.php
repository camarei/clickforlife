<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->input->is_cli_request() or exit("Execute via command line: php index.php migrate");
	}

	public function index()
	{
		$this->load->library('migration');
		if (! $this->migration->current()) {
			show_error($this->migration->error_string());
		} else {
			echo 'Migration was applayd';
		}
		die;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */