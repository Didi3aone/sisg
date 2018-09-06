<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Index Controller.
 * For Login, Logout, Forgot Password, Reset Password
 */
class Auth extends MX_Controller  {

    private $_view_folder = "index/";

    /**
	 * constructor.
	 */
    public function __construct() {
        parent::__construct();
        //get method.
        $method = $this->router->fetch_method();

        if($method == "login" && $this->session->has_userdata(IS_LOGIN_ADMIN)) {
            //redirect to dashboard
            redirect('/dashboard');
        }
    }


    /**
	 * login controller and for login form processing.
	 */
	public function login() {
        //load library and model.
		$this->load->library('form_validation');
        $this->load->model("admin/Admin_model");

        //set validations rules.
        $this->form_validation->set_rules("nik", "NIK", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        $footer = array("script" => 'assets/js/pages/index/login.js');
        $header = array("title" => 'Login');

		//check for validation.
        if ($this->form_validation->run() == FALSE){

        	//send error message to view.
			$error_message = validation_errors();
			$this->session->set_flashdata('message', $error_message);

		} else {

            //get the posted values
            $nik 		= $this->input->post("nik");
            $password	= $this->input->post("password");

			//check to the model if the username, email and password is correct.
			$result = $this->Admin_model->check_login($nik, $password);

			//validate result.
			if ($result) {
                //set session user (for login).
                $sess_data = array(
                	"IS_LOGIN_ADMIN" => TRUE,
                	"name"	   		 => $result['user_name'],
                	"email"	   		 => $result['user_email'],
                	"password"		 => $result['user_password'],
                	"user_id"		 => $result['user_id'],
                	"user_state"	 => $result['user_state'],
                	"nik"			 => $result['user_nik'],
                	"level"			 => $result['role_name']
                );

                $now = date("Y-m-d H:i:s");
                $this->session->set_userdata($sess_data);
                $this->Admin_model->update(array(
                    "user_last_login" => $now,
                    "user_ip_address" => get_client_ip(),
                    "user_state"	  => STATUS_ACTIVE
                ),array("user_id" => $result['user_id']));
                //redirect to library module
                redirect('/dashboard');

			} else {
				//invalid password or email | Username.
				$this->session->set_flashdata('message', 'Username or Password is wrong.');
            }
		}

        //load the views
        $this->load->view(MANAGER_HEADER_SIGNIN ,$header);
        $this->load->view($this->_view_folder . 'login');
        $this->load->view(MANAGER_FOOTER_SIGNIN ,$footer);
	}


	/**
	 * Logout function.
	 */
	public function logout() {
        //unset sessions and back to login.
        $this->session->unset_userdata(IS_LOGIN_ADMIN);
		redirect('/login');
	}


	/**
	 * Forgot password (reset password function).
	 * it will send the "reset password" email from here.
	 */
	// public function forgot_password() {

	// 	//load library and model.
	// 	$this->load->library('form_validation');
 //        $this->load->model("admin/Admin_model");

 //        //set validations rules.
 //        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");

 //        $footer = array("script" => '/js/pages/index/login.js');
 //        $header = array("title" => 'Forgot Password');

	// 	//check for validation.
 //        if ($this->form_validation->run() == FALSE){

 //        	//send error message to view.
	// 		$error_message = validation_errors();
	// 		$this->session->set_flashdata('message', $error_message);
	// 		$this->session->set_flashdata('alert', 'danger');

	// 	} else {

 //            //get the posted values
 //            $email = $this->input->post("email");

	// 		//check to the model if the email is correct.
	// 		$result = $this->Admin_model->get_all_data(array(
 //                "row_array" => TRUE,
 //                "conditions" => array("user_email" => $email),
 //            ))['datas'];

	// 		//validate result.
	// 		if ($result) {
 //                //send email to reset password.

 //                //using transaction.
	// 			$this->db->trans_begin();

 //                //create an url which the user can click to reset their password.
	// 			$forgot_link = $this->Admin_model->send_forgot_pass($result);

 //                //end transaction.
	// 			if ($this->db->trans_status() === FALSE) {
	// 				$this->db->trans_rollback();

 //                    //error something.
	// 				$this->session->set_flashdata('message', 'There is something wrong. Please retry input your email.');
	// 				$this->session->set_flashdata('alert', 'danger');

	// 			} else {
 //                    //success and commiting.
	// 				$this->db->trans_commit();

	// 				//send email to user with the reset password link.
 //                    //get content from view
 //                    $content = $this->load->view('layout/email/forgot_password', '', true);
 //                    $content = str_replace('%NAME%',$result['user_name'],$content);
 //                    $content = str_replace('%LINK%',$forgot_link,$content);

	// 				$mail = sendmail (array(
	// 					'subject'	=> SUBJECT_RESET_PASSWORD,
	// 					'message'	=> $content,
	// 					'to'		=> array($result['user_email']),
	// 				), "html");

	// 				//success, info to check user email.
	// 				$this->session->set_flashdata('message', 'Please check your email to reset your password.');
	// 				$this->session->set_flashdata('alert', 'success');
	// 			}

	// 		} else {
	// 			//invalid email.
	// 			$this->session->set_flashdata('message', 'Email is wrong.');
	// 			$this->session->set_flashdata('alert', 'danger');
 //            }
	// 	}

 //        //load the views.
	// 	$this->load->view(MANAGER_HEADER_SIGNIN ,$header);
	// 	$this->load->view($this->_view_folder . 'forgot-password');
	// 	$this->load->view(MANAGER_FOOTER_SIGNIN ,$footer);
	// }

	/**
	 * Forgot password page
	 */
	public function forgot()
	{
		// Redirect to your logged in landing page here
		// if(logged_in()) redirect('auth/dash');
		$this->load->library('email');
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'mail.it-underground.web.id';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'development@it-underground.web.id';
		$config['smtp_pass']    = 'kipasangin';
		$config['charset']    	= 'utf-8';
		$config['newline']    	= "\r\n";
		$config['mailtype'] 	= 'html'; // or html
		$config['validation'] 	= TRUE; // bool whether to validate email or not      
		$this->email->initialize($config);
		 
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data['success'] = false;
		 
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_exists');
		
		if($this->form_validation->run() == TRUE){
			$email = $this->input->post('email');

			$this->load->model('Dynamic_model');
			$params = array(
				"select" => "user_email",
				"conditions" => array("user_email" => $email),
			);
			$user = $this->Dynamic_model->set_model("mst_user", "mu","user_id")->get_all_data($params)['datas'];

			$slug = md5($user['user_id'] . $user['user_email'] . date('Ymd'));
			$this->load->library('email');
			$this->email->from('development@it-underground.web.id', 'Didi test'); // Change these details
			$this->email->to($email); 
			$this->email->subject('Reset your Password');
			$this->email->message(
				'To reset your password please click the link below and follow the instructions:'. site_url('auth/reset/'. $user['user_id'] .'/'. $slug) .'
			If you did not request to reset your password then please just ignore this email and no changes will occur.
			Note: This reset code will expire after '. date('j M Y') .'.');	
			$this->email->send();
			
			$data['success'] = true;
		}
		
	 	$this->load->view(MANAGER_HEADER_SIGNIN );
		$this->load->view($this->_view_folder . 'forgot-password');
		$this->load->view(MANAGER_FOOTER_SIGNIN );
	}
	/**
	 * function to reset password.
	 * from link in reset password email.
	 */
	public function reset_password($code) {

        //load model.
		$this->load->model('admin/Admin_model');

        //check code.
		if (!$code) {
			show_404();
		}

		//decode code.
		$code_decoded = base64_decode(urldecode($code));

		//check code if exist.
		$user = $this->Admin_model->checkCode($code_decoded);

        //begin transaction.
		$this->db->trans_begin();

		//reset passsword.
		$new_pass = $this->Admin_model->reset_password($user);

        //end transaction.
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();

            //some kind of DB problem?
			show_404();

		} else {
            //success and commiting.
			$this->db->trans_commit();

			//send email for the newly generated password.
            //get content from view
            $content = $this->load->view('layout/email/reset_password', '', true);
            $content = str_replace('%NAME%',$user['user_email'],$content);
            $content = str_replace('%NEW_PASS%',$new_pass,$content);

			$mail = sendmail (array(
				'subject'	=> SUBJECT_PASSWORD_INFO,
				'message'	=> $content,
				'to'		=> array($user['user_email']),
			), "html");

			//close window
			echo "<script>window.close();</script>";
		}
	}

}
