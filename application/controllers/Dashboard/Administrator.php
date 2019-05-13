<?php

class Administrator extends CI_Controller {

	function __construct() {
		parent::__construct();
		// Load dashboard model
		$this->load->model('DashboardModel/Dashboard_Model', 'DashboardModel');
		// Load session library
		$this->load->library('session');

		if ($this->session->userdata('user_type') != 1) {

			$data['error'] = "You are not authorized to view this page!";

			$this->session->sess_destroy();

			echo $this->load->view('login-view/view_login', $data, true);
			
			exit();
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
		echo $get_users;
	}

	public function getUserLogs() {
		$get_user_logs = $this->DashboardModel->get_user_logs();
		echo $get_user_logs;
	}

	// main functions

	public function newUser() {
		$data = array(
			'user_type' => $this->input->post('selected_user_type'),
			'user_gender' => $this->input->post('selected_user_gender'),
			'user_name' => $this->input->post('input_new_user_name'),
			'user_email' => $this->input->post('input_new_user_email'),
			'user_password' => 'defaultpassword123',
			'user_active' => 1
		);

		$save_new_user = $this->DashboardModel->new_user('users', $data);

		if ($save_new_user) {
			echo json_encode($arrayName = array('success' => true, 'message' => 'New User was Created Successfully!'));
		} else {
			echo json_encode($arrayName = array('success' => false));
		}
	}

	public function updateUser() {
		$data = array(
			'user_id' => $this->input->post('edit_user_id'),
			'user_type' => $this->input->post('edit_selected_user_type'),
			'user_gender' => $this->input->post('edit_select_user_gender'),
			'user_name' => $this->input->post('edit_user_name'),
			'user_email' => $this->input->post('edit_user_email'),
			'user_password' => $this->input->post('edit_user_password'),
			'user_active' => 1
		);

		$update_user_data = $this->DashboardModel->update_user('users', $data);

		if ($update_user_data) {
			echo json_encode($arrayName = array('success' => true, 'message' => 'User Details was Updated Successfully!'));
		} else {
			echo json_encode($arrayName = array('success' => false));
		}
	}

	public function userStatus() {
		$data = array(
			'user_id' => $this->input->post('user_status_id')
		);

		$user_status = $this->DashboardModel->manage_user_status('users', $data);

		if ($user_status) {
			echo json_encode($arrayName = array('activated' => false, 'message' => 'User was Deactivated Successfully!'));
		} else {
			echo json_encode($arrayName = array('activated' => true, 'message' => 'User was Activated Successfully!'));
		}
	}

	public function getUserData() {
		$data = array(
			'user_id' => $this->input->post('edit_user_id')
		);

		$fetched_user_data = $this->DashboardModel->get_user_data('users', $data);

		echo $fetched_user_data;
	}
}
