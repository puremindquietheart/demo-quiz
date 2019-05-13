<?php

class Login extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        // Load session library
        $this->load->library('session');

        // Load login model
        $this->load->model('LoginModel/Login_Model', 'LoginModel');
	}
	
	public function index()
	{
        if ($this->session->userdata('user_type') == 1) {
            redirect('index.php/Dashboard/Administrator');
        } else if ($this->session->userdata('user_type') == 2) {
            redirect('index.php/Dashboard/Examinee');
        } else {
            $this->load->view('login-view/view_login');
        }
	}

	public function userAuthenticate() 
	{

        $data = array(
            'user_email' => $this->input->post('user_email'),
            'user_password' => $this->input->post('user_password')
        );


        $check_user_existence = $this->LoginModel->check_user('users', $data);

        if ($check_user_existence) {

            if ($check_user_existence[0]->user_active == 0) {
                $data['inactive'] = "User is not active yet. Please contact your System Administrator!";

                $this->load->view('login-view/view_login', $data);
            } else {
                $this->session->set_userdata('user_id', $check_user_existence[0]->user_id);
                $this->session->set_userdata('user_name', $check_user_existence[0]->user_name);
                $this->session->set_userdata('user_type', $check_user_existence[0]->user_type);
                $this->session->set_userdata('user_gender', $check_user_existence[0]->user_gender);
            
                if ($this->session->userdata('user_type') == 1) {
                    redirect('index.php/Dashboard/Administrator');
                } else {
                    redirect('index.php/Dashboard/Examinee');
                }
            }
            
        } else {
            $data['error'] = "Email or Password is Incorrect!";

            $this->load->view('login-view/view_login', $data);
        }

    }

    public function userLogout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
