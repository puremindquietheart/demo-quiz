<?php

class User_Model extends CI_Model {

  public function __construct() {
    parent::__construct();
    date_default_timezone_set('Asia/Manila');
  }

  public function fetch_exams_details($table, $data) {
    
    $this->db->select('COUNT(CASE WHEN is_taken = 1 THEN 1 END) as exam_taken, 
                       COUNT(CASE WHEN is_passed = 1 THEN 1 END) as exam_pass, 
                       COUNT(CASE WHEN is_passed = 2 THEN 1 END) as exam_fail, 
                       COUNT(CASE WHEN with_prize = 1 THEN 1 END) as total_price');
    $this->db->from($table);
    $this->db->where($data);

    $result = $this->db->get()->result();

    return json_encode($result);
  } 

  public function fetch_assigned_exams($data){
    $this->db->select('e.exam_name, e.exam_type, ue.exam_id');
    $this->db->from('user_exams ue');
    $this->db->join('exams e', 'ue.exam_id = e.exam_id', 'left');
    $this->db->where('ue.user_id', $data['user_id']);
    $this->db->where('ue.is_taken', 0);
    $user_exams_result = $this->db->get()->result();

    return json_encode($user_exams_result);
  }

  public function confirm_take_exam($table, $data) {

    $this->db->set('is_taken', '1');
    $this->db->set('date_taken', Date("Y-m-d H:i:s"));
    $this->db->where($data);
    $this->db->update($table);

    // user logs
    $log_table = 'logs';

    $log_data = array(
      'user_id' => $this->session->userdata('user_id'),
      'log_action' => 'User has taken the exam.',
      'log_date' => Date("Y-m-d H:i:s")
    );

    return true;
  }
}