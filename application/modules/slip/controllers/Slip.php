<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Controller.
 *
 */
class Slip extends CI_Controller  {

    private $_title         = "Slip";
    private $_title_page    = '<i class="fa-fw fa fa-user"></i> Slip ';
    private $_breadcrumb    = "<li><a href='".MANAGER_HOME."'>Home</a></li>";
    private $_active_page   = "slip";
    private $_back          = "/slip";
    private $_js_path       = "/js/pages/slip/";
    private $_view_folder   = "slip/";

    private $_table         = "tbl_upload";
    private $_table_aliases = "tu";
    private $_pk_field      = "upload_id";

    private $_tbl   = "tbl_upload_hsbc";
    private $_alias = "tuh";
    private $_id    = "upload_id";

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
            "title_page"    => $this->_title_page . '<span>> List</span>',
            "active_page"   => "slip-list",
            "breadcrumb"    => $this->_breadcrumb . '<li>SLIP</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/jquery.PrintPage.js"
            ),
            "view_js_nav" => 
                $this->_view_folder."list_js_nav"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'index');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * List hsbc
     */
    public function list() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List</span>',
            "active_page"   => "slip-hsbc-list",
            "breadcrumb"    => $this->_breadcrumb . '<li>SLIP</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/jquery.PrintPage.js"
            ),
            "view_js_nav" => 
                $this->_view_folder."list_js_hsbc"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'list');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * List hsbc
     */
    public function list_bni() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List</span>',
            "active_page"   => "slip-bni-list",
            "breadcrumb"    => $this->_breadcrumb . '<li>SLIP</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/jquery.PrintPage.js"
            ),
            "view_js_nav" => 
                $this->_view_folder."list_js_bni"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'list-bni');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    /**
     * List dipo
     */
    public function list_dipo() {
        //set header attribute.
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List</span>',
            "active_page"   => "slip-dipo-list",
            "breadcrumb"    => $this->_breadcrumb . '<li>SLIP</li>',
        );

        //set footer attribute (additional script and css).
        $footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/jquery.PrintPage.js"
            ),
            "view_js_nav" => 
                $this->_view_folder."list_js_dipo"
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $header);
        $this->load->view($this->_view_folder . 'list-dipo');
        $this->load->view(MANAGER_FOOTER , $footer);
    }

    ////////////////////////////// AJAX CALL ////////////////////////////////////
    /**
     * Function to get list_all_data staff
     */
    public function list_all_data() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
			exit('No direct script access allowed');
		}

		//load model
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
		$sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
		$limit    = sanitize_str_input($this->input->get("length"), "numeric");
		$start    = sanitize_str_input($this->input->get("start"), "numeric");
		$search   = sanitize_str_input($this->input->get("search")['value']);
        $filter   = $this->input->get("filter");

		$select = array(
            'upload_id',
            'nik',
            'name',
            'basic_sallary',
            'upload_date'
        );

        $joined = array("mst_user mu" =>array("mu.user_nik" => $this->_table_aliases.".nik"));

        $column_sort = $select[$sort_col];
        //get nik by user login
        $nik = $this->session->userdata("nik");
        //initialize.
        $data_filters   = array();
        $conditions     = array();
        $level = $this->session->userdata("level");
        if($level == "STAFF INTERNAL") {
            $conditions = array("mu.user_nik" => $nik);
        }
        $status = STATUS_ALL;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'nik':
                        if ($value != "") {
                            $data_filters['lower(nik)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;
                    case 'periode_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(periode_date as date) <="] = $date['end'];
                            $conditions["cast(periode_date as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model($this->_table, $this->_table_aliases, $this->_pk_field)->get_all_data(array(
			'select'             => $select,
            'left_joined'        => $joined,
            'order_by'           => array($column_sort => $sort_dir),
			'limit'              => $limit,
			'start'              => $start,
			'conditions'         => $conditions,
            'filter'             => $data_filters,
			'status'             => $status,
            "count_all_first"    => true,
            "debug"              => false
		));
        //get total rows
        $total_rows = $datas['total'];

        // $get_decode = 
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
    ////////////////////////////// AJAX CALL ////////////////////////////////////
    /**
     * Function to get list_all_data hsbc
     */
    public function list_all_data_hsbc() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        //load model
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit    = sanitize_str_input($this->input->get("length"), "numeric");
        $start    = sanitize_str_input($this->input->get("start"), "numeric");
        $search   = sanitize_str_input($this->input->get("search")['value']);
        $filter   = $this->input->get("filter");

        $select = array(
            'upload_id',
            'nik',
            'name',
            'basic_sallary',
            // 'FROM_BASE64(SUBSTRING(basic_sallary,1,12)) as des_call',
            'upload_date'
        );

        $joined = array("mst_user mu" => array("mu.user_nik" => $this->_alias.".nik"));

        $column_sort = $select[$sort_col];
        //get nik by user login
        $nik = $this->session->userdata("nik");
        //initialize.
        $data_filters   = array();
        $conditions     = array();
        $level = $this->session->userdata("level");
        if($level == "AGENT HSBC") {
            $conditions = array("mu.user_nik" => $nik);
        }
        $status = STATUS_ALL;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'nik':
                        if ($value != "") {
                            $data_filters['lower(mu.user_nik)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;
                    case 'periode_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(periode_date as date) <="] = $date['end'];
                            $conditions["cast(periode_date as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model($this->_tbl, $this->_alias, $this->_id)->get_all_data(array(
            'select'             => $select,
            'left_joined'        => $joined,
            'order_by'           => array($column_sort => $sort_dir),
            'limit'              => $limit,
            'start'              => $start,
            'conditions'         => $conditions,
            'filter'             => $data_filters,
            'status'             => $status,
            "count_all_first"    => true,
            "debug"              => false
        ));
        //get total rows
        $total_rows = $datas['total'];

        // $get_decode = 
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
    ////////////////////////////// AJAX CALL ////////////////////////////////////
    /**
     * Function to get list_all_data hsbc
     */
    public function list_all_data_bni() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        //load model
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit    = sanitize_str_input($this->input->get("length"), "numeric");
        $start    = sanitize_str_input($this->input->get("start"), "numeric");
        $search   = sanitize_str_input($this->input->get("search")['value']);
        $filter   = $this->input->get("filter");

        $select = array(
            'upload_id',
            'nik',
            'name',
            'basic_sallary',
            // 'FROM_BASE64(SUBSTRING(basic_sallary,1,12)) as des_call',
            'upload_date'
        );

        $joined = array("mst_user mu" => array("mu.user_nik" => $this->_alias.".nik"));

        $column_sort = $select[$sort_col];
        //get nik by user login
        $nik = $this->session->userdata("nik");
        //initialize.
        $data_filters   = array();
        $conditions     = array();
        $level = $this->session->userdata("level");
        if($level == "AGENT BNI") {
            $conditions = array("mu.user_nik" => $nik);
        }
        $status = STATUS_ALL;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'nik':
                        if ($value != "") {
                            $data_filters['lower(mu.user_nik)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;
                    case 'periode_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(periode_date as date) <="] = $date['end'];
                            $conditions["cast(periode_date as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model($this->_tbl, $this->_alias, $this->_id)->get_all_data(array(
            'select'             => $select,
            'left_joined'        => $joined,
            'order_by'           => array($column_sort => $sort_dir),
            'limit'              => $limit,
            'start'              => $start,
            'conditions'         => $conditions,
            'filter'             => $data_filters,
            'status'             => $status,
            "count_all_first"    => true,
            "debug"              => false
        ));
        //get total rows
        $total_rows = $datas['total'];

        // $get_decode = 
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
    ////////////////////////////// AJAX CALL ////////////////////////////////////
    /**
     * Function to get list_all_data hsbc
     */
    public function list_all_data_dipo() {
        //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        //load model
        $this->load->model('Dynamic_model');

        //sanitize and get inputed data
        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit    = sanitize_str_input($this->input->get("length"), "numeric");
        $start    = sanitize_str_input($this->input->get("start"), "numeric");
        $search   = sanitize_str_input($this->input->get("search")['value']);
        $filter   = $this->input->get("filter");

        $select = array(
            'upload_id',
            'nik',
            'name',
            'basic_sallary',
            // 'FROM_BASE64(SUBSTRING(basic_sallary,1,12)) as des_call',
            'upload_date'
        );

        $joined = array("mst_user mu" => array("mu.user_nik" => $this->_alias.".nik"));

        $column_sort = $select[$sort_col];
        //get nik by user login
        $nik = $this->session->userdata("nik");
        //initialize.
        $data_filters   = array();
        $conditions     = array();
        $level = $this->session->userdata("level");
        if($level == "AGENT BNI") {
            $conditions = array("mu.user_nik" => $nik);
        }
        $status = STATUS_ALL;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = sanitize_str_input($value);
                switch ($key) {
                    case 'nik':
                        if ($value != "") {
                            $data_filters['lower(mu.user_nik)'] = $value;
                        }
                        break;

                    case 'name':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;
                    case 'periode_date':
                        if ($value != "") {
                            $date = parse_date_range($value);
                            $conditions["cast(periode_date as date) <="] = $date['end'];
                            $conditions["cast(periode_date as date) >="] = $date['start'];

                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->Dynamic_model->set_model($this->_tbl, $this->_alias, $this->_id)->get_all_data(array(
            'select'             => $select,
            'left_joined'        => $joined,
            'order_by'           => array($column_sort => $sort_dir),
            'limit'              => $limit,
            'start'              => $start,
            'conditions'         => $conditions,
            'filter'             => $data_filters,
            'status'             => $status,
            "count_all_first"    => true,
            "debug"              => false
        ));
        //get total rows
        $total_rows = $datas['total'];

        // $get_decode = 
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
    * function for preview slip
    * @param $id 
    * @return array object
    */
    public function preview_print( $id = null)
    {   
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_table_aliases.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_table, 
            $this->_table_aliases, 
            $this->_pk_field)->get_all_data($params)['datas']
        ;
        $data = array(
            "data_print" => $datas
        );
        // pr($datas);exit;
        $this->load->view("slip/preview", $data);
    }

    /**
    * function for preview slip
    * @param $id 
    * @return array object
    */
    public function preview_print_hsbc( $id = null)
    {   
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_alias.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_tbl, 
            $this->_alias, 
            $this->_id)->get_all_data($params)['datas']
        ;
        $data = array(
            "data_print" => $datas
        );
        // pr($datas);exit;
        $this->load->view("slip/preview-hsbc", $data);
    }

    public function print_pdf( $id = null)
    {
        if( empty($id) ) {
            show_404();
        }
        $this->load->model('Dynamic_model');

        $params = array(
            "select"        => "*",
            "conditions"    => array($this->_table_aliases.".upload_id" => $id),
            "row_array"     => true,
            "status"        => STATUS_ALL,
            "debug"         => false
        );

        $datas = $this->Dynamic_model->set_model(
            $this->_table, 
            $this->_table_aliases, 
            $this->_pk_field)->get_all_data($params)['datas']
        ;
        $data = array(
            "data_print" => $datas
        );

        $this->load->library("pdf");
        $this->pdf->load_view('slip/print_pdf', $data);
        $this->pdf->render();
        $this->pdf->stream("SLIP-GAJI.pdf");
    }

    /**
     * it will create a session token that it's validated if succeed.
     */
    public function check_nik_valid()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //get from ajax POST.
        $nik = ($this->input->post("nik") != null) ? trim($this->input->post("nik")) : null;

        $this->load->model('admin/Admin_model');
        $this->db->trans_begin();

        $_currentUser = $this->session->userdata("name");
        //validate password.
        $login = $this->Admin_model->check_nik_valid($_currentUser, $nik);

        //check login valid or not.
        if (!$login) {
            $message['error_msg'] = "Nik salah.";
            $this->output->set_content_type('application/json');
            echo json_encode($message);
            exit;
        }
        $this->db->trans_complete();

        //prepare returns.
        $message['is_error'] = false;
        $message['error_msg'] = "";

        //should we redirect?
        $message['redirect_to'] = "";

        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }
}
