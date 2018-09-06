<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_log extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('change_log_version');	
	}

}

/* End of file change_log.php */
/* Location: ./application/controllers/change_log.php */