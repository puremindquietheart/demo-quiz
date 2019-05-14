<?php

class Examinee extends CI_Controller {

	function __construct() {
        parent::__construct();
        // Load dashboard model
        $this->load->model('UserModel/User_Model', 'User_Model');
		// Load session library
		$this->load->library('session');

        if ($this->session->userdata('user_type') != 2) {

			$data['error'] = "You are not authorized to view this page!";

			$this->session->sess_destroy();

			echo $this->load->view('login-view/view_login', $data, true);
			
			exit();
		}
	}
    
    // load view
    
	public function index()
	{
		$this->load->view('dashboard-view/examinee/examinee_dashboard_view');
    }
    
    public function take_exams()
	{
		$this->load->view('dashboard-view/examinee/examinee_exams_view');
    }

    public function exam_proceed()
    {
        $this->load->view('dashboard-view/examinee/examinee_proceed_exam_view');
    }
    
    // user functions

    public function getUserExamsData() {
        $data = array(
            'user_id' => $this->input->post('user_id')
        );

        $get_user_exams_data = $this->User_Model->fetch_exams_details('user_exams', $data);

        if ($get_user_exams_data) {
            echo $get_user_exams_data;
        }
    }

    public function getAssignedUserExams() {
        $data = array(
            'user_id' => $this->input->post('examinee_id')
        );

        $get_user_exams_data = $this->User_Model->fetch_assigned_exams($data);

        if ($get_user_exams_data) {
            echo $get_user_exams_data;
        }
    }

    public function userTakeExam () {
        $data = array(
            'user_id' => $this->input->post('examinee_id'),
            'exam_id' => $this->input->post('take_exam_id')
        );

        $get_user_exams_data = $this->User_Model->confirm_take_exam('user_exams', $data);

        if ($get_user_exams_data) {
            echo json_encode($arrayName = array('success' => true, 'message' => 'Exam was Confirmed successfully!'));
        }
    }
}
