<?php

class Examinee extends CI_Controller {

	function __construct() {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        if ($this->session->userdata('user_type') != 2) {

			$data['error'] = "You are not authorized to view this page!";

			$this->session->sess_destroy();

            $this->load->view('login-view/view_login', $data);
		}
	}

	public function index()
	{
		$this->load->view('dashboard-view/examinee/examinee_dashboard_view');
	}
}
