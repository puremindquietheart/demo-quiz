<?php

class Administrator extends CI_Controller {

	function __construct() {
		parent::__construct();
		// Load dashboard model
		$this->load->model('DashboardModel/Dashboard_Model', 'DashboardModel');
		$this->load->model('LoginModel/Login_Model', 'LoginModel');
		// Load session library
		$this->load->library('session');

		if ($this->session->userdata('user_type') != 1) {

			$data['error'] = "You are not authorized to view this page!";

			$this->session->sess_destroy();

            $this->load->view('login-view/view_login', $data);
		}
	}
	
	// load views

	public function index() {
		$this->load->view('dashboard-view/admin/admin_dashboard_view');
	}

	public function users() {
		$this->load->view('dashboard-view/admin/admin_users_view');
	}

	public function exams() {
		$this->load->view('dashboard-view/admin/admin_exams_view');
	}

	public function logs() {
		$this->load->view('dashboard-view/admin/admin_logs_view');
	}
	
	// get data

	public function countUsers() {
		
		$count_users = $this->DashboardModel->count_user_data('users');
		echo json_encode($count_users);
	}

	public function countExams() {
		$count_exams = $this->DashboardModel->count_exam_data('user_exams');
		echo json_encode($count_exams);
	}

	public function getUsers() {
		$get_users = $this->DashboardModel->get_users_data('users');
		echo json_encode($get_users);
	}
}
