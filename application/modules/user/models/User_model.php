<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_all_role()
	{
		return $this->db->get("trs_user_role")->result_array();
	}

}

/* End of file User_model.php */
/* Location: ./application/modules/user/models/User_model.php */