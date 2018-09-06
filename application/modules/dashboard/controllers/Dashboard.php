<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Controller.
 * For Dashboard admin
 */
class Dashboard extends MX_Controller  {
    private $_title = "Dashboard";
    private $_title_page = '<i class="fa-fw fa fa-home"></i> Dashboard ';
    private $_active_page = "dashboard";
    private $_breadcrumb = "<li><a href='".MANAGER_HOME."'>Dashboard</a></li>";
    private $_back = "";
    private $_js = "";
    private $_view_folder = "dashboard/";

    /**
	 * constructor.
	 */
    public function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        if($this->session->userdata(IS_LOGIN_ADMIN) == FALSE ) {
            redirect('login');
            $this->session->sess_destroy();
        }
    }

    public function index() {
        $this->load->model("Dynamic_model");

        $params = array(
            "count_all_first" => true,
            "status"    => -1
        );

        $data_aks = $this->Dynamic_model->set_model("tbl_upload","tu","upload_id")->get_all_data($params);

        $param = array(
            "count_all_first" => true,
            "status"    => -1
        );

        $data_hsbc = $this->Dynamic_model->set_model("tbl_upload_hsbc","tuh","upload_id")->get_all_data($params);

        $data = array(
            "data_aks"   => $data_aks,
            "data_hsbc"  => $data_hsbc,
            "browser"    =>  $this->agent->browser()
        );
        $header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> My Dashboard</span>',
            "active_page"   => $this->_active_page,
            "breadcrumb"    => $this->_breadcrumb,
        );

        //load the views.
        $this->load->view(MANAGER_HEADER,$header);
        $this->load->view($this->_view_folder . 'index', $data);
        $this->load->view(MANAGER_FOOTER);
    }

}
