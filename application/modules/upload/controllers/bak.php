<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    private $_title         = "Upload";
    private $_title_page    = '<i class="fa-fw fa fa-envelope"></i> Upload ';
    private $_breadcrumb    = "<li><a href='".MANAGER_HOME."'>Home</a></li>";
    private $_active_page   = "Upload";
    private $_back          = "upload";
    private $_js_view       = "upload/";
    private $_view_folder   = "upload/";
    private $_js_path       = "assets/js/";

    protected $_header;
    protected $_footer;

    private $_table         = "tbl_upload";
    private $_table_aliases = "tu";
    private $_pk            = "upload_id";

    private $_tbl   = "tbl_upload_hsbc";
    private $_alias = "tuh";
    private $_id    = "upload_id";

    public function __construct() {
        parent::__construct();
    }

    /**
    * Function list sms
    * author : didi
    */
    public function index()
    {
        //set header attribute.
        $this->_header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> List upload </span>',
            "active_page"   => "list",
            "breadcrumb"    => $this->_breadcrumb . '<li>upload </li>',
        );

        //set footer attribute (additional script and css).
        $this->_footer = array(
            "view_js_nav"  => $this->_js_view.'group_js',
            "script"       => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
            )
        );

        //load the views.
        $this->load->view(MANAGER_HEADER , $this->_header);
        $this->load->view($this->_view_folder . 'index');
        $this->load->view(MANAGER_FOOTER , $this->_footer);
    }

    /**
     * Create an upload
     */
    public function import () {
        $this->_breadcrumb .= '<li><a href="#">upload</a></li>';
        //prepare header title.
        $this->_header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Upload Data SLIP AKS</span>',
            "title_msg"     => "Form Create",
            "active_page"   => "import",
            "breadcrumb"    => $this->_breadcrumb . '<li>Upload Data SLIP AKS</li>',
            "back"          => $this->_back,
        );

        $this->_footer = array(
            "script" => array(
                $this->_js_path ."import.js"
            )
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $this->_header);
        $this->load->view($this->_view_folder . 'import-template');
        $this->load->view(MANAGER_FOOTER, $this->_footer);
    }

    /**
     * upload data slip hsbc
     */
    public function import_hsbc () {
        $this->_breadcrumb .= '<li><a href="#">upload</a></li>';
        //prepare header title.
        $this->_header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Upload Data SLIP HSBC</span>',
            "title_msg"     => "Form Create",
            "active_page"   => "import-hsbc",
            "breadcrumb"    => $this->_breadcrumb . '<li>Upload Data SLIP HSBC</li>',
            "back"          => $this->_back,
        );

        $this->_footer = array(
            "script" => array(
                $this->_js_path ."import-hsbc.js"
            )
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $this->_header);
        $this->load->view($this->_view_folder . 'import-template-hsbc');
        $this->load->view(MANAGER_FOOTER, $this->_footer);
    }

    /**
     * upload data slip bni
     */
    public function import_bni () {
        $this->_breadcrumb .= '<li><a href="#">upload</a></li>';
        //prepare header title.
        $this->_header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Upload Data SLIP BNI</span>',
            "title_msg"     => "Form Create",
            "active_page"   => "import-hsbc",
            "breadcrumb"    => $this->_breadcrumb . '<li>Upload Data SLIP BNI</li>',
            "back"          => $this->_back,
        );

        $this->_footer = array(
            "script" => array(
                $this->_js_path ."import-hsbc.js"
            )
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $this->_header);
        $this->load->view($this->_view_folder . 'import-template-bni');
        $this->load->view(MANAGER_FOOTER, $this->_footer);
    }

    /**
     * upload data slip dipo
     */
    public function import_dipo () {
        $this->_breadcrumb .= '<li><a href="#">upload</a></li>';
        //prepare header title.
        $this->_header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Upload Data SLIP DIPO</span>',
            "title_msg"     => "Form Create",
            "active_page"   => "import-hsbc",
            "breadcrumb"    => $this->_breadcrumb . '<li>Upload Data SLIP DIPO</li>',
            "back"          => $this->_back,
        );

        $this->_footer = array(
            "script" => array(
                $this->_js_path ."import-hsbc.js"
            )
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $this->_header);
        $this->load->view($this->_view_folder . 'import-template-dipo');
        $this->load->view(MANAGER_FOOTER, $this->_footer);
    }

    /**
     * upload data user
     */
    public function import_user () {
        $this->_breadcrumb .= '<li><a href="#">upload</a></li>';
        //prepare header title.
        $this->_header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Upload Data User AKS</span>',
            "title_msg"     => "Form Create",
            "active_page"   => "import-user",
            "breadcrumb"    => $this->_breadcrumb . '<li>Upload Data User AKS</li>',
            "back"          => $this->_back,
        );

        $this->_footer = array(
            "script" => array(
                $this->_js_path ."import-user.js"
            )
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $this->_header);
        $this->load->view($this->_view_folder . 'import-template-user');
        $this->load->view(MANAGER_FOOTER, $this->_footer);
    }

    /**
     * upload data hsbc
     */
    public function import_user_hsbc () {
        $this->_breadcrumb .= '<li><a href="#">upload</a></li>';
        //prepare header title.
        $this->_header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Upload Data User HSBC</span>',
            "title_msg"     => "Form Create",
            "active_page"   => "import-user-hsbc",
            "breadcrumb"    => $this->_breadcrumb . '<li>Upload Data User HSBC</li>',
            "back"          => $this->_back,
        );

        $this->_footer = array(
            "script" => array(
                $this->_js_path ."import-user.js"
            )
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $this->_header);
        $this->load->view($this->_view_folder . 'import-template-user-hsbc');
        $this->load->view(MANAGER_FOOTER, $this->_footer);
    }

    /**
     * upload data bni
     */
    public function import_user_bni () {
        $this->_breadcrumb .= '<li><a href="#">upload</a></li>';
        //prepare header title.
        $this->_header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Upload Data User BNI</span>',
            "title_msg"     => "Form Create",
            "active_page"   => "import-user-bni",
            "breadcrumb"    => $this->_breadcrumb . '<li>Upload Data User BNI</li>',
            "back"          => $this->_back,
        );

        $this->_footer = array(
            "script" => array(
                $this->_js_path ."import-user.js"
            )
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $this->_header);
        $this->load->view($this->_view_folder . 'import-template-user-bni');
        $this->load->view(MANAGER_FOOTER, $this->_footer);
    }

    /**
     * upload data dipo
     */
    public function import_user_dipo () {
        $this->_breadcrumb .= '<li><a href="#">upload</a></li>';
        //prepare header title.
        $this->_header = array(
            "title"         => $this->_title,
            "title_page"    => $this->_title_page . '<span>> Upload Data User DIPO</span>',
            "title_msg"     => "Form Create",
            "active_page"   => "import-user-dipo",
            "breadcrumb"    => $this->_breadcrumb . '<li>Upload Data User DIPO</li>',
            "back"          => $this->_back,
        );

        $this->_footer = array(
            "script" => array(
                $this->_js_path ."import-user.js"
            )
        );

        //load the view.
        $this->load->view(MANAGER_HEADER, $this->_header);
        $this->load->view($this->_view_folder . 'import-template-user-dipo');
        $this->load->view(MANAGER_FOOTER, $this->_footer);
    }

    /**
     * validating import section
     */
    public function validate_import_hsbc($data, $line)
    {
        $error = "";

        if (check_null_space($data['nik'])) {
            $error .= "Row " . $line . ": NIK cannot be empty.";
        }

        if (check_null_space($data['basic_sallary'])) {
            $error .= "Row " . $line . ": Basic sallary cannot be empty.";
        }

        if (check_null_space($data['sallary_prorate'])) {
            $error .= "Row " . $line . ": sallary prorate cannot be empty.";
        }

        if ($error != "") {
            return $error;
        } else {
            return true;
        }
    }

    /**
     * validating import section
     */
    public function validate_import_bni($data, $line)
    {
        $error = "";

        if (check_null_space($data['nik'])) {
            $error .= "Row " . $line . ": NIK cannot be empty.";
        }

        if (check_null_space($data['basic_sallary'])) {
            $error .= "Row " . $line . ": Basic sallary cannot be empty.";
        }

        if (check_null_space($data['sallary_prorate'])) {
            $error .= "Row " . $line . ": sallary prorate cannot be empty.";
        }

        if ($error != "") {
            return $error;
        } else {
            return true;
        }
    }

    /**
     * validating import section
     */
    public function validate_import_dipo($data, $line)
    {
        $error = "";

        if (check_null_space($data['nik'])) {
            $error .= "Row " . $line . ": NIK cannot be empty.";
        }

        if (check_null_space($data['basic_sallary'])) {
            $error .= "Row " . $line . ": Basic sallary cannot be empty.";
        }

        if (check_null_space($data['sallary_prorate'])) {
            $error .= "Row " . $line . ": sallary prorate cannot be empty.";
        }

        if ($error != "") {
            return $error;
        } else {
            return true;
        }
    }

    /**
     * validating import section
     */
    public function validate_import($data, $line)
    {
        $error = "";

        if (check_null_space($data['nik'])) {
            $error .= "Row " . $line . ": NIK cannot be empty.";
        }

        if (check_null_space($data['basic_sallary'])) {
            $error .= "Row " . $line . ": Basic sallary cannot be empty.";
        }

        if (check_null_space($data['sallary_prorate'])) {
            $error .= "Row " . $line . ": sallary prorate cannot be empty.";
        }

        if ($error != "") {
            return $error;
        } else {
            return true;
        }
    }

    /**
     * validating import section
     */
    public function validate_import_user($data, $line)
    {
        $error = "";

        if (check_null_space($data['user_nik'])) {
            $error .= "Row " . $line . ": NIK cannot be empty.";
        }

        if (check_null_space($data['user_position'])) {
            $error .= "Row " . $line . ": Position cannot be empty.";
        }

        if (check_null_space($data['user_site'])) {
            $error .= "Row " . $line . ": User Site cannot be empty.";
        }

        if (check_null_space($data['user_password'])) {
            $error .= "Row " . $line . ": Password cannot be empty.";
        }

        if ($error != "") {
            return $error;
        } else {
            return true;
        }
    }

    /**
    * proses import data to db
    * author : didi ganteng
    * it-underground.web.id
    */
    public function process_import()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $validate = "";
        $error_validate_flag = false;

        //check validation
        if (isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0) {
            $filename = $_FILES['file']['tmp_name'];
            //check max file upload
            if ($_FILES['file']['size'] > MAX_UPLOAD_FILE_SIZE) {
                $message['error_msg'] = "Maximum file size is ".WORDS_MAX_UPLOAD_FILE_SIZE;
            } elseif (mime_content_type($filename) != "application/vnd.ms-excel"
                        && mime_content_type($filename) != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                //check extension if xls dan xlsx
                $message['error_msg'] = "File must .xls or .xlsx";
            } else {
                //load and init library
                $this->load->library("PHPExcel_reader");
                $excel = new PHPExcel_reader();

                //read the file and give back the result of the file in array
                $result = $excel->read_from_excel($filename);

                if ($result['is_error'] == true) {
                    $message['redirect_to'] = "";
                    $message['error_msg']   = $result['error_msg'];
                } else {

                    //begin transaction
                    $this->db->trans_begin();

                    if (count($result['datas']) > 0) {
                        //loop the result and insert to db
                        $line = 2;
                        foreach ($result['datas'] as $model) {
                            if (count($model) < 1) {
                                $validate = "Invalid Template.";
                                $error_validate_flag = true;
                                break;
                            } else {
                                //check untuk semua kolom apakah null
                                if (empty($model[0]) && empty($model[1]) && empty($model[2]) && empty($model[3]) && empty($model[4]) && empty($model[5]) && empty($model[6]) && empty($model[7]) && empty($model[8]) && empty($model[9]) && empty($model[10]) && empty($model[11]) && empty($model[12]) && empty($model[13]) && empty($model[14]) && empty($model[15]) && empty($model[16]) && empty($model[17]) && empty($model[18]) && empty($model[19]) && empty($model[20]) && empty($model[21]) && empty($model[22]) && empty($model[23]) && empty($model[24]) && empty($model[25]) && empty($model[26]) && empty($model[27]) ) {
                                    $line++;
                                } else {
                                    $encode  = base64_encode($model[8]);
                                    // $encode .= "didiganteng";
                                    $fix_encode = $this->db->escape($encode);
                                    // persiapan data
                                    $data = array(
                                        "periode_date"          => $model[0],
                                        "nik"                   => $model[1],
                                        "name"                  => $model[2],
                                        "code"                  => $model[3],
                                        "status"                => $model[4],
                                        "team"                  => $model[5],
                                        "work_days"             => $model[6],
                                        "position"              => $model[7],
                                        "basic_sallary"         => $encode,
                                        "sallary_prorate"       => base64_encode($model[9]),
                                        "tunjangan_jabatan"     => base64_encode($model[10]),
                                        "over_time"             => base64_encode($model[11]),
                                        "commision_xtradana"    => base64_encode($model[12]),
                                        "total_bruto"           => base64_encode($model[13]),
                                        "commision"             => base64_encode($model[14]),
                                        "tenaga_kerja_a"        => base64_encode($model[15]),
                                        "pensiun"               => base64_encode($model[16]),
                                        "kesehatan_a"           => base64_encode($model[17]),
                                        "total_gaji_bruto"      => base64_encode($model[18]),
                                        "pph_pasal_21"          => base64_encode($model[19]),
                                        "tenaga_kerja_b"        => base64_encode($model[20]),
                                        "bpjs_pensiun_a"        => base64_encode($model[21]),
                                        "kesehatan_b"           => base64_encode($model[22]),
                                        "pinjaman"              => base64_encode($model[23]),
                                        "bpjs_pensiun_b"        => base64_encode($model[24]),
                                        "potongan_lain"         => base64_encode($model[25]),
                                        "thp"                   => base64_encode($model[26]),
                                        "gross_sallary"         => base64_encode($model[27]),
                                        "tunjangan_pph21"       => base64_encode($model[28])
                                    );

                                    // validasi di jadikan satu di fungsi validate_import.
                                    $validate = $this->validate_import($data, $line);

                                    if ($validate !== true) {
                                        //if validate false, return error
                                        $error_validate_flag = true;
                                        break;
                                    } else {
                                        // Prepare 2 dimensions data array for insert_batch
                                        $today = date("Y-m-d H:i:s");
                                        $user_upload = $this->session->userdata("user_id");
                                        $array_insert = array(
                                            "periode_date"          => $model[0],
                                            "nik"                   => $model[1],
                                            "name"                  => $model[2],
                                            "code"                  => $model[3],
                                            "status"                => $model[4],
                                            "team"                  => $model[5],
                                            "work_days"             => $model[6],
                                            "position"              => $model[7],
                                            "basic_sallary"         => $encode,
                                            "sallary_prorate"       => base64_encode($model[9]),
                                            "tunjangan_jabatan"     => base64_encode($model[10]),
                                            "over_time"             => base64_encode($model[11]),
                                            "commision_xtradana"    => base64_encode($model[12]),
                                            "total_bruto"           => base64_encode($model[13]),
                                            "commision"             => base64_encode($model[14]),
                                            "tenaga_kerja_a"        => base64_encode($model[15]),
                                            "pensiun"               => base64_encode($model[16]),
                                            "kesehatan_a"           => base64_encode($model[17]),
                                            "total_gaji_bruto"      => base64_encode($model[18]),
                                            "pph_pasal_21"          => base64_encode($model[19]),
                                            "tenaga_kerja_b"        => base64_encode($model[20]),
                                            "bpjs_pensiun_a"        => base64_encode($model[21]),
                                            "kesehatan_b"           => base64_encode($model[22]),
                                            "pinjaman"              => base64_encode($model[23]),
                                            "bpjs_pensiun_b"        => base64_encode($model[24]),
                                            "potongan_lain"         => base64_encode($model[25]),
                                            "thp"                   => base64_encode($model[26]),
                                            "gross_sallary"         => base64_encode($model[27]),
                                            "tunjangan_pph21"       => base64_encode($model[28]),
                                            "upload_date"           => $today,
                                            "user_upload_id"        => $user_upload
                                        );
                                        // insert_batch 
                                        $insert_data = $this->Dynamic_model->set_model(
                                            $this->_table, 
                                            $this->_table_aliases, 
                                            $this->_pk)->
                                        insert(
                                                $array_insert
                                        );

                                        // print_r($insert_data);exit();
                                        $line++;
                                    }
                                }
                            }
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $message['redirect_to'] = "";

                        if ($error_validate_flag == true) {
                            $message['error_msg'] = $validate;
                        } else {
                            $message['error_msg'] = 'database operation failed.';
                        }
                    } else {
                        $this->db->trans_commit();

                        $message['is_error'] = false;

                        // success.
                        $message['notif_title']   = "Good!";
                        $message['datas']         = count($insert_data);
                        $message['notif_message'] = "Data has been imported.";

                        // on insert, not redirected.
                        $message['redirect_to'] = "";
                    }
                }
            }
        } else {
            $message['error_msg'] = 'File is empty (xls or xlsx).';
        }

        echo json_encode($message);
        exit;
    }

    /**
    * proses import data to db
    * author : didi ganteng
    * it-underground.web.id
    */
    public function process_import_hsbc()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $validate = "";
        $error_validate_flag = false;

        //check validation
        if (isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0) {
            $filename = $_FILES['file']['tmp_name'];
            //check max file upload
            if ($_FILES['file']['size'] > MAX_UPLOAD_FILE_SIZE) {
                $message['error_msg'] = "Maximum file size is ".WORDS_MAX_UPLOAD_FILE_SIZE;
            } elseif (mime_content_type($filename) != "application/vnd.ms-excel"
                        && mime_content_type($filename) != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                //check extension if xls dan xlsx
                $message['error_msg'] = "File must .xls or .xlsx";
            } else {
                //load and init library
                $this->load->library("PHPExcel_reader");
                $excel = new PHPExcel_reader();

                //read the file and give back the result of the file in array
                $result = $excel->read_from_excel($filename);

                if ($result['is_error'] == true) {
                    $message['redirect_to'] = "";
                    $message['error_msg']   = $result['error_msg'];
                } else {

                    //begin transaction
                    $this->db->trans_begin();

                    if (count($result['datas']) > 0) {
                        //loop the result and insert to db
                        $line = 2;
                        foreach ($result['datas'] as $model) {
                            if (count($model) < 1) {
                                $validate = "Invalid Template.";
                                $error_validate_flag = true;
                                break;
                            } else {
                                //check untuk semua kolom apakah null
                                if (empty($model[0]) && empty($model[1]) && empty($model[2]) && empty($model[3]) && empty($model[4]) && empty($model[5]) && empty($model[6]) && empty($model[7]) && empty($model[8]) && empty($model[9]) && empty($model[10]) && empty($model[11]) && empty($model[12]) && empty($model[13]) && empty($model[14]) && empty($model[15]) && empty($model[16]) && empty($model[17]) && empty($model[18]) && empty($model[19]) && empty($model[20]) && empty($model[21]) && empty($model[22]) && empty($model[23]) && empty($model[24]) && empty($model[25]) && empty($model[26]) && empty($model[27]) && empty($model[27])) {
                                    $line++;
                                } else {
                                    $encode  = base64_encode($model[8]);
                                    // $encode .= "didiganteng";
                                    // $fix_encode = $this->db->escape($encode);
                                    // persiapan data
                                    $data = array(
                                        "periode_date"          => $model[0],
                                        "nik"                   => $model[1],
                                        "name"                  => $model[2],
                                        "code"                  => $model[3],
                                        "status"                => $model[4],
                                        "team"                  => $model[5],
                                        "work_days"             => $model[6],
                                        "position"              => $model[7],
                                        "basic_sallary"         => $encode,
                                        "sallary_prorate"       => base64_encode($model[9]),
                                        "tunjangan_jabatan"     => base64_encode($model[10]),
                                        "over_time"             => base64_encode($model[11]),
                                        "commision_taxi"        => base64_encode($model[12]),
                                        "total"                 => base64_encode($model[13]),
                                        "commision"             => base64_encode($model[14]),
                                        "reward"                => base64_encode($model[15]),
                                        "rapelan_jan_mar"       => base64_encode($model[16]),
                                        "rapelan_ot_jan_mar"    => base64_encode($model[17]),
                                        "bpjs_tenaga_kerja_1"   => base64_encode($model[18]),
                                        "bpjs_pensiun_1"        => base64_encode($model[19]),
                                        "bpjs_kesehatan_1"      => base64_encode($model[20]),
                                        "total_gaji_bruto"      => base64_encode($model[21]),
                                        "pph_pasal_21"          => base64_encode($model[22]),
                                        "bpjs_tenaga_kerja_2"   => base64_encode($model[23]),
                                        "bpjs_pensiun_2"        => base64_encode($model[24]),
                                        "bpjs_kesehatan_2"      => base64_encode($model[25]),
                                        "potongan_outing"       => base64_encode($model[26]),
                                        "potongan_parkir"       => base64_encode($model[27]),
                                        "thp"                   => base64_encode($model[28])
                                    );

                                    // validasi di jadikan satu di fungsi validate_import.
                                    $validate = $this->validate_import_hsbc($data, $line);

                                    if ($validate !== true) {
                                        //if validate false, return error
                                        $error_validate_flag = true;
                                        break;
                                    } else {
                                        // Prepare 2 dimensions data array for insert_batch
                                        $today = date("Y-m-d H:i:s");
                                        $user_upload = $this->session->userdata("user_id");
                                        $array_insert = array(
                                            "periode_date"          => $model[0],
                                            "nik"                   => $model[1],
                                            "name"                  => $model[2],
                                            "code"                  => $model[3],
                                            "status"                => $model[4],
                                            "team"                  => $model[5],
                                            "work_days"             => $model[6],
                                            "position"              => $model[7],
                                            "basic_sallary"         => $encode,
                                            "sallary_prorate"       => base64_encode($model[9]),
                                            "tunjangan_jabatan"     => base64_encode($model[10]),
                                            "over_time"             => base64_encode($model[11]),
                                            "commision_taxi"        => base64_encode($model[12]),
                                            "total"                 => base64_encode($model[13]),
                                            "commision"             => base64_encode($model[14]),
                                            "reward"                => base64_encode($model[15]),
                                            "rapelan_jan_mar"       => base64_encode($model[16]),
                                            "rapelan_ot_jan_mar"    => base64_encode($model[17]),
                                            "bpjs_tenaga_kerja_1"   => base64_encode($model[18]),
                                            "bpjs_pensiun_1"        => base64_encode($model[19]),
                                            "bpjs_kesehatan_1"      => base64_encode($model[20]),
                                            "total_gaji_bruto"      => base64_encode($model[21]),
                                            "pph_pasal_21"          => base64_encode($model[22]),
                                            "bpjs_tenaga_kerja_2"   => base64_encode($model[23]),
                                            "bpjs_pensiun_2"        => base64_encode($model[24]),
                                            "bpjs_kesehatan_2"      => base64_encode($model[25]),
                                            "potongan_outing"       => base64_encode($model[26]),
                                            "potongan_parkir"       => base64_encode($model[27]),
                                            "thp"                   => base64_encode($model[28]),
                                            "upload_date"           => $today,
                                            "user_upload_id"        => $user_upload
                                        );

                                        // insert_batch 
                                        $insert_data = $this->Dynamic_model->set_model(
                                            $this->_tbl, 
                                            $this->_alias, 
                                            $this->_id)->
                                        insert(
                                                $array_insert
                                        );
                                        $line++;
                                    }
                                }
                            }
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $message['redirect_to'] = "";

                        if ($error_validate_flag == true) {
                            $message['error_msg'] = $validate;
                        } else {
                            $message['error_msg'] = 'database operation failed.';
                        }
                    } else {
                        $this->db->trans_commit();

                        $message['is_error'] = false;

                        // success.
                        $message['notif_title']   = "Good!";
                        $message['notif_message'] = "Data has been imported.";

                        // on insert, not redirected.
                        $message['redirect_to'] = "";
                    }
                }
            }
        } else {
            $message['error_msg'] = 'File is empty (xls or xlsx).';
        }

        echo json_encode($message);
        exit;
    }

     /**
    * proses import data to db
    * author : didi ganteng
    * it-underground.web.id
    */
    public function process_import_bni()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $validate = "";
        $error_validate_flag = false;

        //check validation
        if (isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0) {
            $filename = $_FILES['file']['tmp_name'];
            //check max file upload
            if ($_FILES['file']['size'] > MAX_UPLOAD_FILE_SIZE) {
                $message['error_msg'] = "Maximum file size is ".WORDS_MAX_UPLOAD_FILE_SIZE;
            } elseif (mime_content_type($filename) != "application/vnd.ms-excel"
                        && mime_content_type($filename) != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                //check extension if xls dan xlsx
                $message['error_msg'] = "File must .xls or .xlsx";
            } else {
                //load and init library
                $this->load->library("PHPExcel_reader");
                $excel = new PHPExcel_reader();

                //read the file and give back the result of the file in array
                $result = $excel->read_from_excel($filename);

                if ($result['is_error'] == true) {
                    $message['redirect_to'] = "";
                    $message['error_msg']   = $result['error_msg'];
                } else {

                    //begin transaction
                    $this->db->trans_begin();

                    if (count($result['datas']) > 0) {
                        //loop the result and insert to db
                        $line = 2;
                        foreach ($result['datas'] as $model) {
                            if (count($model) < 1) {
                                $validate = "Invalid Template.";
                                $error_validate_flag = true;
                                break;
                            } else {
                                //check untuk semua kolom apakah null
                                if (empty($model[0]) && empty($model[1]) && empty($model[2]) && empty($model[3]) && empty($model[4]) && empty($model[5]) && empty($model[6]) && empty($model[7]) && empty($model[8]) && empty($model[9]) && empty($model[10]) && empty($model[11]) && empty($model[12]) && empty($model[13]) && empty($model[14]) && empty($model[15]) && empty($model[16]) && empty($model[17]) && empty($model[18]) && empty($model[19]) && empty($model[20]) && empty($model[21]) && empty($model[22]) && empty($model[23]) && empty($model[24]) && empty($model[25]) && empty($model[26]) && empty($model[27]) && empty($model[27])) {
                                    $line++;
                                } else {
                                    $encode  = base64_encode($model[8]);
                                    // $encode .= "didiganteng";
                                    // $fix_encode = $this->db->escape($encode);
                                    // persiapan data
                                    $data = array(
                                        "periode_date"          => $model[0],
                                        "nik"                   => $model[1],
                                        "name"                  => $model[2],
                                        "code"                  => $model[3],
                                        "status"                => $model[4],
                                        "team"                  => $model[5],
                                        "work_days"             => $model[6],
                                        "position"              => $model[7],
                                        "basic_sallary"         => $encode,
                                        "sallary_prorate"       => base64_encode($model[9]),
                                        "tunjangan_jabatan"     => base64_encode($model[10]),
                                        "over_time"             => base64_encode($model[11]),
                                        "commision_taxi"        => base64_encode($model[12]),
                                        "total"                 => base64_encode($model[13]),
                                        "commision"             => base64_encode($model[14]),
                                        "reward"                => base64_encode($model[15]),
                                        "rapelan_jan_mar"       => base64_encode($model[16]),
                                        "rapelan_ot_jan_mar"    => base64_encode($model[17]),
                                        "bpjs_tenaga_kerja_1"   => base64_encode($model[18]),
                                        "bpjs_pensiun_1"        => base64_encode($model[19]),
                                        "bpjs_kesehatan_1"      => base64_encode($model[20]),
                                        "total_gaji_bruto"      => base64_encode($model[21]),
                                        "pph_pasal_21"          => base64_encode($model[22]),
                                        "bpjs_tenaga_kerja_2"   => base64_encode($model[23]),
                                        "bpjs_pensiun_2"        => base64_encode($model[24]),
                                        "bpjs_kesehatan_2"      => base64_encode($model[25]),
                                        "potongan_outing"       => base64_encode($model[26]),
                                        "potongan_parkir"       => base64_encode($model[27]),
                                        "thp"                   => base64_encode($model[28])
                                    );

                                    // validasi di jadikan satu di fungsi validate_import.
                                    $validate = $this->validate_import_hsbc($data, $line);

                                    if ($validate !== true) {
                                        //if validate false, return error
                                        $error_validate_flag = true;
                                        break;
                                    } else {
                                        // Prepare 2 dimensions data array for insert_batch
                                        $today = date("Y-m-d H:i:s");
                                        $user_upload = $this->session->userdata("user_id");
                                        $array_insert = array(
                                            "periode_date"          => $model[0],
                                            "nik"                   => $model[1],
                                            "name"                  => $model[2],
                                            "code"                  => $model[3],
                                            "status"                => $model[4],
                                            "team"                  => $model[5],
                                            "work_days"             => $model[6],
                                            "position"              => $model[7],
                                            "basic_sallary"         => $encode,
                                            "sallary_prorate"       => base64_encode($model[9]),
                                            "tunjangan_jabatan"     => base64_encode($model[10]),
                                            "over_time"             => base64_encode($model[11]),
                                            "commision_taxi"        => base64_encode($model[12]),
                                            "total"                 => base64_encode($model[13]),
                                            "commision"             => base64_encode($model[14]),
                                            "reward"                => base64_encode($model[15]),
                                            "rapelan_jan_mar"       => base64_encode($model[16]),
                                            "rapelan_ot_jan_mar"    => base64_encode($model[17]),
                                            "bpjs_tenaga_kerja_1"   => base64_encode($model[18]),
                                            "bpjs_pensiun_1"        => base64_encode($model[19]),
                                            "bpjs_kesehatan_1"      => base64_encode($model[20]),
                                            "total_gaji_bruto"      => base64_encode($model[21]),
                                            "pph_pasal_21"          => base64_encode($model[22]),
                                            "bpjs_tenaga_kerja_2"   => base64_encode($model[23]),
                                            "bpjs_pensiun_2"        => base64_encode($model[24]),
                                            "bpjs_kesehatan_2"      => base64_encode($model[25]),
                                            "potongan_outing"       => base64_encode($model[26]),
                                            "potongan_parkir"       => base64_encode($model[27]),
                                            "thp"                   => base64_encode($model[28]),
                                            "upload_date"           => $today,
                                            "user_upload_id"        => $user_upload
                                        );

                                        // insert_batch 
                                        $insert_data = $this->Dynamic_model->set_model(
                                            $this->_tbl, 
                                            $this->_alias, 
                                            $this->_id)->
                                        insert(
                                                $array_insert
                                        );
                                        $line++;
                                    }
                                }
                            }
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $message['redirect_to'] = "";

                        if ($error_validate_flag == true) {
                            $message['error_msg'] = $validate;
                        } else {
                            $message['error_msg'] = 'database operation failed.';
                        }
                    } else {
                        $this->db->trans_commit();

                        $message['is_error'] = false;

                        // success.
                        $message['notif_title']   = "Good!";
                        $message['notif_message'] = "Data has been imported.";

                        // on insert, not redirected.
                        $message['redirect_to'] = "";
                    }
                }
            }
        } else {
            $message['error_msg'] = 'File is empty (xls or xlsx).';
        }

        echo json_encode($message);
        exit;
    }

     /**
    * proses import data to db
    * author : didi ganteng
    * it-underground.web.id
    */
    public function process_import_dipo()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $validate = "";
        $error_validate_flag = false;

        //check validation
        if (isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0) {
            $filename = $_FILES['file']['tmp_name'];
            //check max file upload
            if ($_FILES['file']['size'] > MAX_UPLOAD_FILE_SIZE) {
                $message['error_msg'] = "Maximum file size is ".WORDS_MAX_UPLOAD_FILE_SIZE;
            } elseif (mime_content_type($filename) != "application/vnd.ms-excel"
                        && mime_content_type($filename) != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                //check extension if xls dan xlsx
                $message['error_msg'] = "File must .xls or .xlsx";
            } else {
                //load and init library
                $this->load->library("PHPExcel_reader");
                $excel = new PHPExcel_reader();

                //read the file and give back the result of the file in array
                $result = $excel->read_from_excel($filename);

                if ($result['is_error'] == true) {
                    $message['redirect_to'] = "";
                    $message['error_msg']   = $result['error_msg'];
                } else {

                    //begin transaction
                    $this->db->trans_begin();

                    if (count($result['datas']) > 0) {
                        //loop the result and insert to db
                        $line = 2;
                        foreach ($result['datas'] as $model) {
                            if (count($model) < 1) {
                                $validate = "Invalid Template.";
                                $error_validate_flag = true;
                                break;
                            } else {
                                //check untuk semua kolom apakah null
                                if (empty($model[0]) && empty($model[1]) && empty($model[2]) && empty($model[3]) && empty($model[4]) && empty($model[5]) && empty($model[6]) && empty($model[7]) && empty($model[8]) && empty($model[9]) && empty($model[10]) && empty($model[11]) && empty($model[12]) && empty($model[13]) && empty($model[14]) && empty($model[15]) && empty($model[16]) && empty($model[17]) && empty($model[18]) && empty($model[19]) && empty($model[20]) && empty($model[21]) && empty($model[22]) && empty($model[23]) && empty($model[24]) && empty($model[25]) && empty($model[26]) && empty($model[27]) && empty($model[27])) {
                                    $line++;
                                } else {
                                    $encode  = base64_encode($model[8]);
                                    // $encode .= "didiganteng";
                                    // $fix_encode = $this->db->escape($encode);
                                    // persiapan data
                                    $data = array(
                                        "periode_date"          => $model[0],
                                        "nik"                   => $model[1],
                                        "name"                  => $model[2],
                                        "code"                  => $model[3],
                                        "status"                => $model[4],
                                        "team"                  => $model[5],
                                        "work_days"             => $model[6],
                                        "position"              => $model[7],
                                        "basic_sallary"         => $encode,
                                        "sallary_prorate"       => base64_encode($model[9]),
                                        "tunjangan_jabatan"     => base64_encode($model[10]),
                                        "over_time"             => base64_encode($model[11]),
                                        "commision_taxi"        => base64_encode($model[12]),
                                        "total"                 => base64_encode($model[13]),
                                        "commision"             => base64_encode($model[14]),
                                        "reward"                => base64_encode($model[15]),
                                        "rapelan_jan_mar"       => base64_encode($model[16]),
                                        "rapelan_ot_jan_mar"    => base64_encode($model[17]),
                                        "bpjs_tenaga_kerja_1"   => base64_encode($model[18]),
                                        "bpjs_pensiun_1"        => base64_encode($model[19]),
                                        "bpjs_kesehatan_1"      => base64_encode($model[20]),
                                        "total_gaji_bruto"      => base64_encode($model[21]),
                                        "pph_pasal_21"          => base64_encode($model[22]),
                                        "bpjs_tenaga_kerja_2"   => base64_encode($model[23]),
                                        "bpjs_pensiun_2"        => base64_encode($model[24]),
                                        "bpjs_kesehatan_2"      => base64_encode($model[25]),
                                        "potongan_outing"       => base64_encode($model[26]),
                                        "potongan_parkir"       => base64_encode($model[27]),
                                        "thp"                   => base64_encode($model[28])
                                    );

                                    // validasi di jadikan satu di fungsi validate_import.
                                    $validate = $this->validate_import_hsbc($data, $line);

                                    if ($validate !== true) {
                                        //if validate false, return error
                                        $error_validate_flag = true;
                                        break;
                                    } else {
                                        // Prepare 2 dimensions data array for insert_batch
                                        $today = date("Y-m-d H:i:s");
                                        $user_upload = $this->session->userdata("user_id");
                                        $array_insert = array(
                                            "periode_date"          => $model[0],
                                            "nik"                   => $model[1],
                                            "name"                  => $model[2],
                                            "code"                  => $model[3],
                                            "status"                => $model[4],
                                            "team"                  => $model[5],
                                            "work_days"             => $model[6],
                                            "position"              => $model[7],
                                            "basic_sallary"         => $encode,
                                            "sallary_prorate"       => base64_encode($model[9]),
                                            "tunjangan_jabatan"     => base64_encode($model[10]),
                                            "over_time"             => base64_encode($model[11]),
                                            "commision_taxi"        => base64_encode($model[12]),
                                            "total"                 => base64_encode($model[13]),
                                            "commision"             => base64_encode($model[14]),
                                            "reward"                => base64_encode($model[15]),
                                            "rapelan_jan_mar"       => base64_encode($model[16]),
                                            "rapelan_ot_jan_mar"    => base64_encode($model[17]),
                                            "bpjs_tenaga_kerja_1"   => base64_encode($model[18]),
                                            "bpjs_pensiun_1"        => base64_encode($model[19]),
                                            "bpjs_kesehatan_1"      => base64_encode($model[20]),
                                            "total_gaji_bruto"      => base64_encode($model[21]),
                                            "pph_pasal_21"          => base64_encode($model[22]),
                                            "bpjs_tenaga_kerja_2"   => base64_encode($model[23]),
                                            "bpjs_pensiun_2"        => base64_encode($model[24]),
                                            "bpjs_kesehatan_2"      => base64_encode($model[25]),
                                            "potongan_outing"       => base64_encode($model[26]),
                                            "potongan_parkir"       => base64_encode($model[27]),
                                            "thp"                   => base64_encode($model[28]),
                                            "upload_date"           => $today,
                                            "user_upload_id"        => $user_upload
                                        );

                                        // insert_batch 
                                        $insert_data = $this->Dynamic_model->set_model(
                                            $this->_tbl, 
                                            $this->_alias, 
                                            $this->_id)->
                                        insert(
                                                $array_insert
                                        );
                                        $line++;
                                    }
                                }
                            }
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $message['redirect_to'] = "";

                        if ($error_validate_flag == true) {
                            $message['error_msg'] = $validate;
                        } else {
                            $message['error_msg'] = 'database operation failed.';
                        }
                    } else {
                        $this->db->trans_commit();

                        $message['is_error'] = false;

                        // success.
                        $message['notif_title']   = "Good!";
                        $message['notif_message'] = "Data has been imported.";

                        // on insert, not redirected.
                        $message['redirect_to'] = "";
                    }
                }
            }
        } else {
            $message['error_msg'] = 'File is empty (xls or xlsx).';
        }

        echo json_encode($message);
        exit;
    }

    public function process_import_user()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $validate = "";
        $error_validate_flag = false;

        //check validation
        if (isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0) {
            $filename = $_FILES['file']['tmp_name'];
            //check max file upload
            if ($_FILES['file']['size'] > MAX_UPLOAD_FILE_SIZE) {
                $message['error_msg'] = "Maximum file size is ".WORDS_MAX_UPLOAD_FILE_SIZE;
            } elseif (mime_content_type($filename) != "application/vnd.ms-excel"
                        && mime_content_type($filename) != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                //check extension if xls dan xlsx
                $message['error_msg'] = "File must .xls or .xlsx";
            } else {
                //load and init library
                $this->load->library("PHPExcel_reader");
                $excel = new PHPExcel_reader();

                //read the file and give back the result of the file in array
                $result = $excel->read_from_excel($filename);

                if ($result['is_error'] == true) {
                    $message['redirect_to'] = "";
                    $message['error_msg']   = $result['error_msg'];
                } else {

                    //begin transaction
                    $this->db->trans_begin();

                    if (count($result['datas']) > 0) {
                        //loop the result and insert to db
                        $line = 2;
                        foreach ($result['datas'] as $model) {
                            if (count($model) < 1) {
                                $validate = "Invalid Template.";
                                $error_validate_flag = true;
                                break;
                            } else {
                                //check untuk semua kolom apakah null
                                if (empty($model[0]) && empty($model[1]) && empty($model[2]) && empty($model[3]) && empty($model[4]) && empty($model[5]) && empty($model[6])) {
                                    $line++;
                                } else {
                                    // $encode .= "didiganteng";
                                    // $fix_encode = $this->db->escape($encode);
                                    // persiapan data
                                    $data = array(
                                        "user_full_name" => $model[0],
                                        "user_nik"       => $model[1],
                                        "user_position"  => $model[2],
                                        "user_site"      => $model[3],
                                        "user_email"     => $model[4],
                                        "user_password"  => sha1(ENCRYPT_DEV_AKS.$this->db->escape_str($model[5]))
                                    );

                                    // validasi di jadikan satu di fungsi validate_import.
                                    $validate = $this->validate_import_user($data, $line);

                                    if ($validate !== true) {
                                        //if validate false, return error
                                        $error_validate_flag = true;
                                        break;
                                    } else {
                                        // Prepare 2 dimensions data array for insert_batch
                                        $today = date("Y-m-d H:i:s");
                                        $user_upload = $this->session->userdata("user_id");
                                        $array_insert = array(
                                            "user_full_name" => $model[0],
                                            "user_nik"       => $model[1],
                                            "user_position"  => $model[2],
                                            "user_site"      => $model[3],
                                            "user_email"     => $model[4],
                                            "user_password"  => sha1(ENCRYPT_DEV_AKS.$this->db->escape_str($model[5])),
                                            "user_created_date" => $today,
                                            "user_role_id"   => 3,
                                            "user_register_date" => $today
                                        );
                                        // pr($this->input->post());exit;
                                        // insert_batch 
                                        $insert_data = $this->Dynamic_model->set_model(
                                            "mst_user", 
                                            "mu", 
                                            "user_id")->
                                        insert(
                                                $array_insert
                                        );
                                        $line++;
                                    }
                                }
                            }
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $message['redirect_to'] = "";

                        if ($error_validate_flag == true) {
                            $message['error_msg'] = $validate;
                        } else {
                            $message['error_msg'] = 'database operation failed.';
                        }
                    } else {
                        $this->db->trans_commit();

                        $message['is_error'] = false;

                        // success.
                        $message['notif_title']   = "Good!";
                        $message['notif_message'] = "Data has been imported.";

                        // on insert, not redirected.
                        $message['redirect_to'] = "";
                    }
                }
            }
        } else {
            $message['error_msg'] = 'File is empty (xls or xlsx).';
        }

        echo json_encode($message);
        exit;
    }

    public function process_import_user_hsbc()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $validate = "";
        $error_validate_flag = false;

        //check validation
        if (isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0) {
            $filename = $_FILES['file']['tmp_name'];
            //check max file upload
            if ($_FILES['file']['size'] > MAX_UPLOAD_FILE_SIZE) {
                $message['error_msg'] = "Maximum file size is ".WORDS_MAX_UPLOAD_FILE_SIZE;
            } elseif (mime_content_type($filename) != "application/vnd.ms-excel"
                        && mime_content_type($filename) != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                //check extension if xls dan xlsx
                $message['error_msg'] = "File must .xls or .xlsx";
            } else {
                //load and init library
                $this->load->library("PHPExcel_reader");
                $excel = new PHPExcel_reader();

                //read the file and give back the result of the file in array
                $result = $excel->read_from_excel($filename);

                if ($result['is_error'] == true) {
                    $message['redirect_to'] = "";
                    $message['error_msg']   = $result['error_msg'];
                } else {

                    //begin transaction
                    $this->db->trans_begin();

                    if (count($result['datas']) > 0) {
                        //loop the result and insert to db
                        $line = 2;
                        foreach ($result['datas'] as $model) {
                            if (count($model) < 1) {
                                $validate = "Invalid Template.";
                                $error_validate_flag = true;
                                break;
                            } else {
                                //check untuk semua kolom apakah null
                                if (empty($model[0]) && empty($model[1]) && empty($model[2]) && empty($model[3]) && empty($model[4]) && empty($model[5]) && empty($model[6])) {
                                    $line++;
                                } else {
                                    // $encode .= "didiganteng";
                                    // $fix_encode = $this->db->escape($encode);
                                    // persiapan data
                                    $data = array(
                                        "user_full_name" => $model[0],
                                        "user_nik"       => $model[1],
                                        "user_position"  => $model[2],
                                        "user_site"      => $model[3],
                                        "user_email"     => $model[4],
                                        "user_password"  => sha1(ENCRYPT_DEV_AKS.$this->db->escape_str($model[5]))
                                    );

                                    // validasi di jadikan satu di fungsi validate_import.
                                    $validate = $this->validate_import_user($data, $line);

                                    if ($validate !== true) {
                                        //if validate false, return error
                                        $error_validate_flag = true;
                                        break;
                                    } else {
                                        // Prepare 2 dimensions data array for insert_batch
                                        $today = date("Y-m-d H:i:s");
                                        $user_upload = $this->session->userdata("user_id");
                                        $array_insert = array(
                                            "user_full_name" => $model[0],
                                            "user_nik"       => $model[1],
                                            "user_position"  => $model[2],
                                            "user_site"      => $model[3],
                                            "user_email"     => $model[4],
                                            "user_password"  => sha1(ENCRYPT_DEV_AKS.$this->db->escape_str($model[5])),
                                            "user_created_date" => $today,
                                            "user_role_id"   => 3,
                                            "user_register_date" => $today
                                        );
                                        // pr($this->input->post());exit;
                                        // insert_batch 
                                        $insert_data = $this->Dynamic_model->set_model(
                                            "mst_user_hsbc", 
                                            "muh", 
                                            "user_id")->
                                        insert(
                                                $array_insert
                                        );
                                        $line++;
                                    }
                                }
                            }
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $message['redirect_to'] = "";

                        if ($error_validate_flag == true) {
                            $message['error_msg'] = $validate;
                        } else {
                            $message['error_msg'] = 'database operation failed.';
                        }
                    } else {
                        $this->db->trans_commit();

                        $message['is_error'] = false;

                        // success.
                        $message['notif_title']   = "Good!";
                        $message['notif_message'] = "Data has been imported.";

                        // on insert, not redirected.
                        $message['redirect_to'] = "";
                    }
                }
            }
        } else {
            $message['error_msg'] = 'File is empty (xls or xlsx).';
        }

        echo json_encode($message);
        exit;
    }

    public function process_import_user_bni()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $validate = "";
        $error_validate_flag = false;

        //check validation
        if (isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0) {
            $filename = $_FILES['file']['tmp_name'];
            //check max file upload
            if ($_FILES['file']['size'] > MAX_UPLOAD_FILE_SIZE) {
                $message['error_msg'] = "Maximum file size is ".WORDS_MAX_UPLOAD_FILE_SIZE;
            } elseif (mime_content_type($filename) != "application/vnd.ms-excel"
                        && mime_content_type($filename) != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                //check extension if xls dan xlsx
                $message['error_msg'] = "File must .xls or .xlsx";
            } else {
                //load and init library
                $this->load->library("PHPExcel_reader");
                $excel = new PHPExcel_reader();

                //read the file and give back the result of the file in array
                $result = $excel->read_from_excel($filename);

                if ($result['is_error'] == true) {
                    $message['redirect_to'] = "";
                    $message['error_msg']   = $result['error_msg'];
                } else {

                    //begin transaction
                    $this->db->trans_begin();

                    if (count($result['datas']) > 0) {
                        //loop the result and insert to db
                        $line = 2;
                        foreach ($result['datas'] as $model) {
                            if (count($model) < 1) {
                                $validate = "Invalid Template.";
                                $error_validate_flag = true;
                                break;
                            } else {
                                //check untuk semua kolom apakah null
                                if (empty($model[0]) && empty($model[1]) && empty($model[2]) && empty($model[3]) && empty($model[4]) && empty($model[5]) && empty($model[6])) {
                                    $line++;
                                } else {
                                    // $encode .= "didiganteng";
                                    // $fix_encode = $this->db->escape($encode);
                                    // persiapan data
                                    $data = array(
                                        "user_full_name" => $model[0],
                                        "user_nik"       => $model[1],
                                        "user_position"  => $model[2],
                                        "user_site"      => $model[3],
                                        "user_email"     => $model[4],
                                        "user_password"  => sha1(ENCRYPT_DEV_AKS.$this->db->escape_str($model[5]))
                                    );

                                    // validasi di jadikan satu di fungsi validate_import.
                                    $validate = $this->validate_import_user($data, $line);

                                    if ($validate !== true) {
                                        //if validate false, return error
                                        $error_validate_flag = true;
                                        break;
                                    } else {
                                        // Prepare 2 dimensions data array for insert_batch
                                        $today = date("Y-m-d H:i:s");
                                        $user_upload = $this->session->userdata("user_id");
                                        $array_insert = array(
                                            "user_full_name" => $model[0],
                                            "user_nik"       => $model[1],
                                            "user_position"  => $model[2],
                                            "user_site"      => $model[3],
                                            "user_email"     => $model[4],
                                            "user_password"  => sha1(ENCRYPT_DEV_AKS.$this->db->escape_str($model[5])),
                                            "user_created_date" => $today,
                                            "user_role_id"   => 3,
                                            "user_register_date" => $today
                                        );
                                        // pr($this->input->post());exit;
                                        // insert_batch 
                                        $insert_data = $this->Dynamic_model->set_model(
                                            "mst_user_bni", 
                                            "mu", 
                                            "user_id")->
                                        insert(
                                                $array_insert
                                        );
                                        $line++;
                                    }
                                }
                            }
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $message['redirect_to'] = "";

                        if ($error_validate_flag == true) {
                            $message['error_msg'] = $validate;
                        } else {
                            $message['error_msg'] = 'database operation failed.';
                        }
                    } else {
                        $this->db->trans_commit();

                        $message['is_error'] = false;

                        // success.
                        $message['notif_title']   = "Good!";
                        $message['notif_message'] = "Data has been imported.";

                        // on insert, not redirected.
                        $message['redirect_to'] = "";
                    }
                }
            }
        } else {
            $message['error_msg'] = 'File is empty (xls or xlsx).';
        }

        echo json_encode($message);
        exit;
    }

    public function process_import_user_dipo()
    {
        //must ajax and must post.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load the model.
        $this->load->model('Dynamic_model');

        //initial.
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $validate = "";
        $error_validate_flag = false;

        //check validation
        if (isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0) {
            $filename = $_FILES['file']['tmp_name'];
            //check max file upload
            if ($_FILES['file']['size'] > MAX_UPLOAD_FILE_SIZE) {
                $message['error_msg'] = "Maximum file size is ".WORDS_MAX_UPLOAD_FILE_SIZE;
            } elseif (mime_content_type($filename) != "application/vnd.ms-excel"
                        && mime_content_type($filename) != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                //check extension if xls dan xlsx
                $message['error_msg'] = "File must .xls or .xlsx";
            } else {
                //load and init library
                $this->load->library("PHPExcel_reader");
                $excel = new PHPExcel_reader();

                //read the file and give back the result of the file in array
                $result = $excel->read_from_excel($filename);

                if ($result['is_error'] == true) {
                    $message['redirect_to'] = "";
                    $message['error_msg']   = $result['error_msg'];
                } else {

                    //begin transaction
                    $this->db->trans_begin();

                    if (count($result['datas']) > 0) {
                        //loop the result and insert to db
                        $line = 2;
                        foreach ($result['datas'] as $model) {
                            if (count($model) < 1) {
                                $validate = "Invalid Template.";
                                $error_validate_flag = true;
                                break;
                            } else {
                                //check untuk semua kolom apakah null
                                if (empty($model[0]) && empty($model[1]) && empty($model[2]) && empty($model[3]) && empty($model[4]) && empty($model[5]) && empty($model[6])) {
                                    $line++;
                                } else {
                                    // $encode .= "didiganteng";
                                    // $fix_encode = $this->db->escape($encode);
                                    // persiapan data
                                    $data = array(
                                        "user_full_name" => $model[0],
                                        "user_nik"       => $model[1],
                                        "user_position"  => $model[2],
                                        "user_site"      => $model[3],
                                        "user_email"     => $model[4],
                                        "user_password"  => sha1(ENCRYPT_DEV_AKS.$this->db->escape_str($model[5]))
                                    );

                                    // validasi di jadikan satu di fungsi validate_import.
                                    $validate = $this->validate_import_user($data, $line);

                                    if ($validate !== true) {
                                        //if validate false, return error
                                        $error_validate_flag = true;
                                        break;
                                    } else {
                                        // Prepare 2 dimensions data array for insert_batch
                                        $today = date("Y-m-d H:i:s");
                                        $user_upload = $this->session->userdata("user_id");
                                        $array_insert = array(
                                            "user_full_name" => $model[0],
                                            "user_nik"       => $model[1],
                                            "user_position"  => $model[2],
                                            "user_site"      => $model[3],
                                            "user_email"     => $model[4],
                                            "user_password"  => sha1(ENCRYPT_DEV_AKS.$this->db->escape_str($model[5])),
                                            "user_created_date" => $today,
                                            "user_role_id"   => 3,
                                            "user_register_date" => $today
                                        );
                                        // pr($this->input->post());exit;
                                        // insert_batch 
                                        $insert_data = $this->Dynamic_model->set_model(
                                            "mst_user_dipo", 
                                            "mu", 
                                            "user_id")->
                                        insert(
                                                $array_insert
                                        );
                                        $line++;
                                    }
                                }
                            }
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $message['redirect_to'] = "";

                        if ($error_validate_flag == true) {
                            $message['error_msg'] = $validate;
                        } else {
                            $message['error_msg'] = 'database operation failed.';
                        }
                    } else {
                        $this->db->trans_commit();

                        $message['is_error'] = false;

                        // success.
                        $message['notif_title']   = "Good!";
                        $message['notif_message'] = "Data has been imported.";

                        // on insert, not redirected.
                        $message['redirect_to'] = "";
                    }
                }
            }
        } else {
            $message['error_msg'] = 'File is empty (xls or xlsx).';
        }

        echo json_encode($message);
        exit;
    }
}
