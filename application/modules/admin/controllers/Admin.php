<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Controller.
 *
 */
class Admin extends CI_Controller  {

    private $_title = "Admin";
    private $_title_page = '<i class="fa-fw fa fa-user"></i> Admin ';
    private $_breadcrumb = "<li><a href='".MANAGER_HOME."'>Home</a></li>";
    private $_active_page = "admin";
    private $_back = "/admin";
    private $_js_path = "/js/pages/admin/";
    private $_view_folder = "admin/";

    /**
	 * constructor.
	 */
    public function __construct() {
        parent::__construct();

    }

    //////////////////////////////// VIEWS //////////////////////////////////////

    /**
     * List Admin
     */
    public function index() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List Admin</span>',
            "active_page"   => "list",
            "breadcrumb"    => $this->_breadcrumb . '<li>Admin</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "/js/plugins/datatables/jquery.dataTables.min.js",
                "/js/plugins/datatables/dataTables.bootstrap.min.js",
                "/js/plugins/datatable-responsive/datatables.responsive.min.js",
                $this->_js_path . "list.js",
            ),
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * Create an admin
     */
    public function create () {
        $this->_breadcrumb .= '<li><a href="/admin">Admin</a></li>';

        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Create Admin</span>',
            "active_page"   => "create",
            "breadcrumb"    => $this->_breadcrumb . '<li>Create Admin</li>',
            "back"          => $this->_back,
        );

        $footer = array(
            "script" => $this->_js_path . "create.js",
        );

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder . 'create');
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
     * Edit an admin
     */
    public function edit ($admin_id = null) {
        $this->_breadcrumb .= '<li><a href="/admin">Admin</a></li>';

        //load the model.
		$this->load->model('Admin_model');
        $data['item'] = null;

        //validate ID and check for data.
        if ( $admin_id === null || !is_numeric($admin_id) ) {
            show_404();

        }

        $params = array("row_array" => true,"conditions" => array("admin_id" => $admin_id));
        //get the data.
        $data['item'] = $this->Admin_model->get_all_data($params)['datas'];

        //if no data found with that ID, throw error.
        if (empty($data['item'])) {
            show_404();
        }

        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Edit Admin</span>',
            "active_page"   => $this->_active_page,
            "breadcrumb"    => $this->_breadcrumb . '<li>Edit Admin</li>',
            "back"          => $this->_back,
        );

        $footer = array(
            "script" => $this->_js_path . "create.js",
        );

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder . 'create', $data);
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
     * view an admin
     */
    public function view ($admin_id = null) {
        $this->_breadcrumb .= '<li><a href="/admin">Admin</a></li>';

        //load the model.
		$this->load->model('Admin_model');
        $data['item'] = null;

        //validate ID and check for data.
        if ( $admin_id === null || !is_numeric($admin_id) ) {
            show_404();

        }

        $params = array("row_array" => true,"conditions" => array("admin_id" => $admin_id));
        //get the data.
        $data['item'] = $this->Admin_model->get_all_data($params)['datas'];

        //if no data found with that ID, throw error.
        if (empty($data['item'])) {
            show_404();
        }

        //prepare header title.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> View Admin</span>',
            "active_page"   => $this->_active_page,
            "breadcrumb"    => $this->_breadcrumb . '<li>View Admin</li>',
            "back"          => $this->_back,
        );

        $footer = array();

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
        $this->load->view($this->_view_folder . 'view', $data);
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
     * Change Profile
     */
    public function change_profile () {
        //prepare header title.
        $header = array(
            "title"         => 'Change Profile',
            "title_page"    => '<i class="fa-fw fa fa-user"></i> Change Profile',
            "active_page"   => '',
            "breadcrumb"    => $this->_breadcrumb . '<li>Change Profile</li>',
            "back"          => $this->_back,
        );

        $footer = array(
            "script" => $this->_js_path . "change_profile.js",
        );

        $data['item'] = $this->_currentUser;

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
		$this->load->view($this->_view_folder . 'change-profile',$data);
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    /**
     * Change Password
     */
    public function change_password () {
        //prepare header title.
        $header = array(
            "title"         => 'Change Password',
            "title_page"    => '<i class="fa-fw fa fa-user"></i> Change Password',
            "active_page"   => '',
            "breadcrumb"    =>  $this->_breadcrumb . '<li>Change Password</li>',
            "back"          => $this->_back,
        );

        $footer = array(
            "script" => $this->_js_path . "change_password.js",
        );

		//load the view.
		$this->load->view(MANAGER_HEADER, $header);
		$this->load->view($this->_view_folder . 'change-password');
		$this->load->view(MANAGER_FOOTER, $footer);
    }

    //////////////////////////////// RULES //////////////////////////////////////

    /**
     * Set validation rule for admin create and edit
     */
    private function _set_rule_validation($id) {

        //prepping to set no delimiters.
        $this->form_validation->set_error_delimiters('', '');

        //validates.
        $this->form_validation->set_rules("fullname", "Full Name", "trim|required");
        $this->form_validation->set_rules("username", "Username", "trim|required|min_length[3]|max_length[100]");

        //special validations for when editing.
        // $this->form_validation->set_rules('username', 'Username', "trim|required|callback_check_username[$id]");
        // $this->form_validation->set_rules('email', 'Email', "trim|required|callback_check_email[$id]");

        //when insert only, check password.
        if (!$id) {
            $this->form_validation->set_rules('password', 'Password', "trim|required|min_length[4]|max_length[20]");
            $this->form_validation->set_rules('conf_password', 'Confirmation Password', "trim|required|min_length[4]|max_length[20]|matches[password]");
        } else {
            $this->form_validation->set_rules('new_password', 'New Password', "trim|min_length[4]|max_length[20]");
            if($this->input->post('new_password') != "") $this->form_validation->set_rules('conf_new_password', 'Confirmation New Password', "trim|required|min_length[4]|max_length[20]|matches[new_password]");
        }
    }

    /**
     * RULE validation for Change Profile
     */
    private function _set_rule_validation_profile($id) {

        //prepping to set no delimiters.
        $this->form_validation->set_error_delimiters('','');

        //validates.
        $this->form_validation->set_rules("name", "Name", "trim|required|min_length[3]|max_length[100]");

        //special validations for when editing.
		$this->form_validation->set_rules('username', 'Username', "trim|required|callback_check_username[$id]");
		$this->form_validation->set_rules('email', 'Email', "trim|required|callback_check_email[$id]");
    }

    /**
     * set rule validation for change password
     */
    private function _set_rule_validation_pass () {
        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules("password", "Old Password", "required|min_length[6]|max_length[12]|callback_password_check");
        $this->form_validation->set_rules("new_password", "New Password", "required|min_length[6]|max_length[12]|matches[confirm_password]");
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|min_length[6]|max_length[12]");
    }

    /**
     * This is a custom form validation rule to check that username is must unique.
     */
  //   public function check_username($str, $id) {
  //       //sanitize input

  //       //flag.
  //       $isValid = true;
  //       $params = array("row_array" => true);

		// if ($id == "") {
		// 	//from create
		// 	$params['conditions'] = array("user_name" => $str);
		// } else {
		// 	$params['conditions'] = array("user_name" => $str, "user_id !=" => $id);
		// }

		// $datas = $this->Admin_model->get_all_data($params)['datas'];

		// if ($datas) {
		// 	$isValid = false;
		// 	$this->form_validation->set_message('check_username', '{field} is already taken.');
		// }
  //       return $isValid;
  //   }

    /**
     * This is a custom form validation rule to check that email is must unique.
     */
	// public function check_email($str, $id) {
 //        //flag.
 //        $isValid    = true;
 //        $params     = array("row_array" => true);

	// 	if ($id == "") {
	// 		//from create
	// 		$params['conditions'] = array("user_email" => $str);
	// 	} else {
	// 		$params['conditions'] = array("user_email" => $str, "user_id !=" => $id);
	// 	}

	// 	$datas = $this->Admin_model->get_all_data($params)['datas'];
	// 	if ($datas) {
	// 		$isValid = false;
	// 		$this->form_validation->set_message('check_email', '{field} is already taken.');
	// 	}

 //        return $isValid;
 //    }

    /**
     * check old password same as inputed old password
     */
    public function password_check ($old_pass) {

        $pass = $this->session->userdata('password');

		//check password
		if (password_verify($old_pass, $pass)) {
			return TRUE;
		} else {
			$this->form_validation->set_message('password_check', '{field} does not match');
			return FALSE;
		}
    }

    ////////////////////////////// AJAX CALL ////////////////////////////////////

    /**
     * Function to get list_all_data admin
     */
    public function list_all_data() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
			exit('No direct script access allowed');
		}

		//load model
        $this->load->model('Admin_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
		$sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
		$limit = sanitize_str_input($this->input->get("length"), "numeric");
		$start = sanitize_str_input($this->input->get("start"), "numeric");
		$search = sanitize_str_input($this->input->get("search")['value']);
        $filter = $this->input->get("filter");

		$select = array('admin_id','name','username','email','admin_type','last_login_time','is_active');

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array();
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'id':
                        if ($value != "") {
                            $data_filters['lower(admin_id)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;

                    case 'username':
                        if ($value != "") {
                            $data_filters['lower(username)'] = $value;
                        }
                        break;

                    case 'email':
                        if ($value != "") {
                            $data_filters['lower(email)'] = $value;
                        }
                        break;

                    case 'admin_type':
                        if ($value != "") {
                            $data_filters['lower(admin_type)'] = $value;
                        }
                        break;

                    case 'status':
                        if ($value != "") {
                            $status = ($value == "active") ? STATUS_ACTIVE : STATUS_DELETE;
                        }
                        break;

                    case 'last_login':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(last_login_time as date) <="] = $date['end'];
                            $conditions["cast(last_login_time as date) >="] = $date['start'];

                        }
                        break;
                    case 'create_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(created_date as date) <="] = $date['end'];
                            $conditions["cast(created_date as date) >="] = $date['start'];

                        }
                        break;
                    case 'update_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(updated_date as date) <="] = $date['end'];
                            $conditions["cast(updated_date as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Admin_model->get_all_data(array(
			'select' => $select,
            'order_by' => array($column_sort => $sort_dir),
			'limit' => $limit,
			'start' => $start,
			'conditions' => $conditions,
            'filter' => $data_filters,
			'status' => $status,
            "count_all_first" => true,
		));

        //get total rows
        $total_rows = $datas['total'];

        $output = array(
            "data" => $datas['datas'],
			"draw" => intval($this->input->get("draw")),
			"recordsTotal" => $total_rows,
			"recordsFiltered" => $total_rows,
		);

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    /**
     * Method to process adding or editing via ajax post.
     */
    public function process_form() {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
			exit('No direct script access allowed');
		}

        //load form validation lib.
        $this->load->library('form_validation');

        //load the model.
        $this->load->model('Admin_model');

        //initial.
        $message['alert_error'] = true;
		$message['error_msg'] = "";
        $message['redirect_to'] = "";

        //sanitize input (id is primary key, if from edit, it has value).
        $id             = $this->input->post('id');
        $name           = $this->input->post('fullname');
        $username       = $this->input->post('username');
        $email          = $this->input->post('email');
        $password       = $this->input->post('password');
        $new_password   = $this->input->post('new_password');
        $div_id         = $this->input->post('divisi_id');
        $date_now       = date('Y-m-d H:i:s');

        //server side validation.
        $this->_set_rule_validation($id);

        //checking.
        if ($this->form_validation->run($this) == FALSE) {

            //validation failed.
            $message['error_msg'] = validation_errors();
        } else {
            //begin transaction.
            $this->db->trans_begin();

            $data = $this->Admin_model->get_all_data(array(
                "row_array" => true,
                //"conditions" => array("user_id" => $id)
            ))['datas'];

            if( $data['user_name'] == $username )
            {
                $message['alert_error'] = true;
                $message['error_msg'] = "Username already exist";
                $this->output->set_content_type('application/json');
                echo json_encode($message);
                exit;
            }
            //validation success, prepare array to DB.
            $_save_data = array(
                'user_full_name'        => $name,
                'user_name'             => $username,
                'user_email'            => $email,
                'user_register_date'    => $date_now,
                'user_divisi_id'        => $div_id
            );

            //insert or update?
            if ($id == "") {
                //insert to DB.
                $_save_data['user_password']     = sha1($password);
                $_save_data['user_created_date'] = $date_now;
                $result = $this->Admin_model->insert($_save_data);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message['error_msg'] = 'database operation failed.';

                } else {
                    $this->db->trans_commit();

                    $message['alert_error'] = false;
                    //success.
                    //growler.
                    $message['notif_title']     = "Good!";
                    $message['notif_message']   = "Registration success.";
                    //on insert, not redirected.
                    $message['redirect_to']     = "";
                }
            } else {
                //update.
                if ($new_password != "") {
                    $arrayToDB['user_password'] = $new_password;
                }
                //condition for update.
                $condition = array("user_id" => $id);
                $result = $this->Admin_model->update($arrayToDB, $condition);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message['error_msg'] = 'database operation failed.';

                } else {

                    $this->db->trans_commit();
                    //check if admin id equals to current user login
                    //re-set session
                    if ($this->_currentUser['admin_id'] == $id) {
                        $params = array("row_array" => true,"conditions" => array("admin_id" => $id));
                        $data_admin = $this->Admin_model->get_all_data($params)['datas'];
                        $this->session->set_userdata(ADMIN_SESSION, $data_admin);
                    }
                    $message['is_error'] = false;
                    //success.
                    //growler.
                    $message['notif_title'] = "Excellent!";
                    $message['notif_message'] = "Admin has been updated.";

                    //on update, redirect.
                    $message['redirect_to'] = "/admin";
                }
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * Change Profile Process form
     */
    public function change_profile_process() {
		if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
			exit('No direct script access allowed');
		}

        //set secure to true
        $this->_secure = true;

        //load form validation lib.
        $this->load->library('form_validation');

		//load the model.
		$this->load->model('Admin_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
		$message['error_msg'] = "";

		$id         = $this->_currentUser['admin_id'];
        $name       = sanitize_str_input($this->input->post('name'));
        $username   = sanitize_str_input($this->input->post('username'));
        $email      = sanitize_str_input($this->input->post('email'));

        $this->_set_rule_validation_profile($id);

        if ($this->form_validation->run($this) == FALSE) {
            //validation failed.
            $message['error_msg'] = validation_errors();
        } else {
			//begin transaction.
            $this->db->trans_begin();

            //validation success, prepare array to DB.
            $arrayToDB = array('name'       => $name,
                               'username' 	=> $username,
                               'email'      => $email);

			if (!empty($id)) {
				$condition = array("admin_id" => $id);
                $insert = $this->Admin_model->update($arrayToDB,$condition);
			}

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$message['error_msg'] = 'database operation failed.';

			} else {
				$this->db->trans_commit();

                //set is error to false
                $message['is_error'] = false;

                //success.
                //growler.
                $message['notif_title'] = "Good!";
                $message['notif_message'] = "Profile has been updated.";

                //on insert, not redirected.
                $message['redirect_to'] = "/";


				//re-set the session
				$params = array("row_array" => true,"conditions" => array("admin_id" => $id));
                $data_admin = $this->Admin_model->get_all_data($params)['datas'];
                $this->session->set_userdata(ADMIN_SESSION, $data_admin);
			}
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;

    }

    /**
     * Change Password Process form
     */
    public function change_password_process()
    {
		if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
			exit('No direct script access allowed');
		}
        //load form validation lib.
        $this->load->library('form_validation');

		//load the model.
		$this->load->model('Admin_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
		$message['error_msg'] = "";

		$id       = $this->session->userdata('user_id');
		$password = $this->input->post('confirm_password');

        $this->_set_rule_validation_pass();

        if ($this->form_validation->run($this) == FALSE) {
            //validation failed.
            $message['error_msg'] = validation_errors();
        } else {
			//begin transaction.
            $this->db->trans_begin();

            //validation success, prepare array to DB.
            $SaveData = array('password'   => $password);

			if (!empty($id)) {
				$condition = array("user_id" => $id);
                $insert = $this->Admin_model->update($SaveData,$condition);
			}

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$message['error_msg'] = 'database operation failed.';

			} else {
				$this->db->trans_commit();

                //set is error to false
                $message['is_error'] = false;

                //success.
                //growler.
                $message['notif_title'] = "Good!";
                $message['notif_message'] = "Password has been updated.";

                //on insert, not redirected.
                $message['redirect_to'] = "/";


				//re-set the session
				$params = array("row_array" => true,"conditions" => array("user_id" => $id));
                $data_admin = $this->Admin_model->get_all_data($params)['datas'];
                $sess_data = array(
                    "IS_LOGIN_ADMIN" => TRUE,
                    "name"           => $data_admin['user_name'],
                    "email"          => $data_admin['user_email'],
                    "password"       => $data_admin['user_password'],
                    "user_id"        => $data_admin['user_id']
                );
                $this->session->set_userdata($sess_data);
			}
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;

    }

    /**
     * Delete an admin.
     */
    public function delete() {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Admin_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = sanitize_str_input($this->input->post('id'), "numeric");

        //check first.
        if (!empty($id) && is_numeric($id)) {

            //check if admin id is the current login ?
            if ($this->_currentUser['admin_id'] == $id) {
                $message['error_msg'] = 'Cannot delete the Admin account you are currently logged in with.';
                //encoding and returning.
                $this->output->set_content_type('application/json');
                echo json_encode($message);
                exit;
            }

            $total = $this->Admin_model->get_all_data(array(
                "count_all_first" => TRUE,
                "status" => STATUS_ACTIVE,
            ))['total'];

            //check if this is only the last id in admin
            if ($total == 1) {
                $message['error_msg'] = 'Cannot delete the last Admin account. At least one admin account is needed to access the management site.';
                //encoding and returning.
                $this->output->set_content_type('application/json');
                echo json_encode($message);
                exit;
            }

            //get data admin
            $data = $this->Admin_model->get_all_data(array(
                "find_by_pk" => array($id),
                "status" => STATUS_ACTIVE,
                "row_array" => TRUE,
            ))['datas'];

            //no data is found with that ID.
            if (empty($data)) {
                $message['error_msg'] = 'Invalid ID.';

            } else {

                //begin transaction
                $this->db->trans_begin();

                //delete the data (deactivate)
                $condition = array("admin_id" => $id);
                $delete = $this->Admin_model->delete($condition);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();

                    //failed.
                    $message['error_msg'] = 'database operation failed';
                } else {
                    $this->db->trans_commit();
                    //success.
                    $message['is_error'] = false;
                    $message['error_msg'] = '';

                    //growler.
                    $message['notif_title'] = "Done!";
                    $message['notif_message'] = "Admin has been delete.";
                    $message['redirect_to'] = "";
                }
            }

        } else {
            //id is not passed.
            $message['error_msg'] = 'Invalid ID.';
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * Reactivate an admin.
     */
    public function reactivate() {

        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Admin_model');

        //initial.
        $message['is_error'] = true;
        $message['redirect_to'] = "";
        $message['error_msg'] = "";

        //sanitize input (id is primary key).
        $id = sanitize_str_input($this->input->post('id'), "numeric");

        //check first.
        if (!empty($id) && is_numeric($id)) {
            //get data admin
            $data = $this->Admin_model->get_all_data(array(
                "find_by_pk" => array($id),
                "status" => STATUS_DELETE,
                "row_array" => TRUE,
            ))['datas'];

            //no data is found with that ID.
            if (empty($data)) {
                $message['error_msg'] = 'Invalid ID.';

            } else {

                //begin transaction
                $this->db->trans_begin();

                //delete the data (deactivate)
                $condition = array("admin_id" => $id);
                $delete = $this->Admin_model->update(array("is_active" => STATUS_ACTIVE),$condition);

                //end transaction.
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();

                    //failed.
                    $message['error_msg'] = 'database operation failed';
                } else {
                    $this->db->trans_commit();
                    //success.
                    $message['is_error'] = false;
                    $message['error_msg'] = '';

                    //growler.
                    $message['notif_title'] = "Done!";
                    $message['notif_message'] = "Admin has been re-activated.";
                    $message['redirect_to'] = "";
                }
            }

        } else {
            //id is not passed.
            $message['error_msg'] = 'Invalid ID.';
        }

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

}
