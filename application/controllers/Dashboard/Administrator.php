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

	public function user_exams() {
		$this->load->view('dashboard-view/admin/admin_user_exams');
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

	public function getExams() {
		$get_exams = $this->DashboardModel->get_exams_data();
		echo $get_exams;
	}

	public function getUserLogs() {
		$get_user_logs = $this->DashboardModel->get_user_logs();
		echo $get_user_logs;
	}

	public function getUserExams() {
		$get_user_exams = $this->DashboardModel->get_user_exams();
		echo $get_user_exams;
	}

	public function getExaminee() {
		$get_examinee = $this->DashboardModel->get_examinee();
		echo $get_examinee;
	}
	

	// main functions for users

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

	// main functions for exams

	public function newExam() {
		$data = array(
			'exam_type' => $this->input->post('selected_exam_type'),
			'exam_name' => $this->input->post('input_new_exam'),
			'date_added' => Date("Y-m-d H:i:s")
		);
		
		$save_new_exam = $this->DashboardModel->new_exam('exams', $data);

		if ($save_new_exam) {
			echo json_encode($arrayName = array('success' => true, 'message' => 'New Exam was Created Successfully!'));
		} else {
			echo json_encode($arrayName = array('success' => false));
		}
	}

	public function getExamDetails() {
		$data = array(
			'exam_id' => $this->input->post('edit_exam_id')
		);

		$fetched_exam_data = $this->DashboardModel->get_exam_data('exams', $data);

		echo $fetched_exam_data;
	}

	public function updateExam() {
		$data = array(
			'exam_id' => $this->input->post('edit_exam_id'),
			'exam_type' => $this->input->post('edit_selected_exam_type'),
			'exam_name' => $this->input->post('edit_exam_name'),
			'date_updated' => Date("Y-m-d H:i:s")
		);
		
		$update_exam_details = $this->DashboardModel->update_exam('exams', $data);

		if ($update_exam_details) {
			echo json_encode($arrayName = array('success' => true, 'message' => 'Exam Details was Updated Successfully!'));
		} else {
			echo json_encode($arrayName = array('success' => false));
		}
	}

	public function newQuestion() {
		$data = array(
			'exam_id' => $this->input->post('question_exam_id'),
			'question_description' => $this->input->post('input_question'),
			'answer_a' => $this->input->post('input_answer_a'),
			'answer_b' => $this->input->post('input_answer_b'),
			'answer_c' => $this->input->post('input_answer_c'),
			'answer_d' => $this->input->post('input_answer_d'),
			'correct_answer' => $this->input->post('correct_answer')
		);
		
		$save_new_question = $this->DashboardModel->new_question('exam_questions', $data);

		if ($save_new_question) {
			echo json_encode($arrayName = array('success' => true, 'message' => 'New Exam was Added Successfully!'));
		} 
	}

	public function assignExam() { 
		$data = array(
			'user_id' => $this->input->post('selected_examinee_id'),
			'exam_id' => $this->input->post('assigned_exam_id')
		);

		$assigned_user_exam = $this->DashboardModel->assign_user_exam('users', $data);

		if ($assigned_user_exam) {
			echo json_encode($arrayName = array('success' => true, 'message' => 'Exam was Assigned to User Successfully!'));
		}
	}
}
