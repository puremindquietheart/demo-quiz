<?php

class Dashboard_Model extends CI_Model {

  public function __construct() {
    parent::__construct();
    date_default_timezone_set('Asia/Manila');
  }

  // get data

  public function count_user_data($table) {

    $this->db->select('COUNT(CASE WHEN user_active = 1 THEN 1 END) as active_users, COUNT(CASE WHEN user_active = 0 THEN 1 END) as inactive_users');

    $this->db->from($table);

    $result = $this->db->get();

    return $result->result();
  }
  
  public function count_exam_data($table) {

    $this->db->select('COUNT(CASE WHEN is_passed = 1 THEN 1 END) as passed_examinees, COUNT(CASE WHEN is_passed = 0 THEN 1 END) as failed_examinees');

    $this->db->from($table);

    $result = $this->db->get();

    return $result->result();
  }

  public function get_users_data($table) {

    $this->db->select('*');

    $this->db->from($table);

    $this->db->order_by("user_id", "desc");

    $result = $this->db->get();

    return json_encode($result->result());
  }

  public function get_exams_data() {

    $this->db->select('e.exam_name, e.exam_type, e.exam_id, eq.exam_id as eq_exam_id');

    $this->db->from('exams e');

    $this->db->join('exam_questions eq', 'e.exam_id = eq.exam_id', 'left', FALSE);
    
    $this->db->group_by('e.exam_id');

    $this->db->order_by('e.exam_id', 'desc');

    $result = $this->db->get();

    return json_encode($result->result());
  }

  public function get_user_logs() {
    $this->db->select('u.user_name, l.log_action, l.log_date');
    $this->db->from('logs l');
    $this->db->join('users u', 'l.user_id = u.user_id', 'left');
    $this->db->order_by("l.log_id", "desc");

    $result = $this->db->get()->result(); 

    return json_encode($result);
  }

  public function get_user_exams() {
    $this->db->select('u.user_name, e.exam_name, e.exam_type, ue.is_taken, ue.is_passed, ue.exam_score, ue.with_prize');
    $this->db->from('user_exams ue');
    $this->db->join('users u', 'ue.user_id = u.user_id', 'left');
    $this->db->join('exams e', 'ue.exam_id = e.exam_id', 'left');
    $this->db->order_by("ue.id", "desc");

    $result = $this->db->get()->result(); 

    return json_encode($result);
  }

  public function get_examinee() {
    $this->db->select('u.user_id, u.user_name');
    $this->db->from('users u');
    $this->db->join('user_exams ue', 'u.user_id = ue.user_id', 'left');
    $this->db->where('u.user_type', 2);
    $this->db->where('u.has_exam', 0);
    $this->db->order_by('u.user_id', 'desc');

    $result = $this->db->get()->result(); 

    return json_encode($result);
  }

  // users main functions

  public function new_user($table, $data) {

    $this->db->select('*');

    $this->db->from($table);
    
    $this->db->where('user_email', $data['user_email']); 

    $result = $this->db->get();

    if ($result->num_rows() == 1) {

      return false;

    } else {
      // user logs
      $log_table = 'logs';

      $log_data = array(
        'user_id' => $this->session->userdata('user_id'),
        'log_action' => 'New user was created.',
        'log_date' => Date("Y-m-d H:i:s")
      );

      $this->db->insert($table, $data);

      $this->db->insert($log_table, $log_data);

      return true;
    }
  }

  public function update_user($table, $data) {
    
    $this->db->select('user_email');

    $this->db->from($table);
    
    $this->db->where('user_id', $data['user_id']); 

    $get_user_email = $this->db->get()->row()->user_email;

    if ($get_user_email == $data['user_email']) {
      // user logs
      $log_table = 'logs';

      $log_data = array(
        'user_id' => $this->session->userdata('user_id'),
        'log_action' => 'User details was updated.',
        'log_date' => Date("Y-m-d H:i:s")
      );

      $this->db->where('user_id', $data['user_id']);
      $this->db->update($table, $data);
      $this->db->insert($log_table, $log_data);

      return true;
    } else {
      $this->db->from($table);

      $this->db->where('user_email', $data['user_email']);

      $email_exist = $this->db->get();

      if ($email_exist->num_rows() == 1) {
        return false;
      } else {
        // user logs
        $log_table = 'logs';

        $log_data = array(
          'user_id' => $this->session->userdata('user_id'),
          'log_action' => 'User details was updated.',
          'log_date' => Date("Y-m-d H:i:s")
        );

        $this->db->where('user_id', $data['user_id']);
        $this->db->update($table, $data);
        $this->db->insert($log_table, $log_data);

        return true;
      }
    }
  }

  public function manage_user_status($table, $data) {

    $this->db->select('user_active');
    $this->db->from($table);
    $this->db->where($data);
    $result = $this->db->get()->row()->user_active;

    if ($result == 1) {
      $this->db->set('user_active', '0');
      $this->db->where($data);
      $this->db->update($table);
      // user logs
      $log_table = 'logs';

      $log_data = array(
        'user_id' => $this->session->userdata('user_id'),
        'log_action' => 'User was deactivated.',
        'log_date' => Date("Y-m-d H:i:s")
      );

      $this->db->insert($log_table, $log_data);

      return true;
    } else {

      $this->db->set('user_active', '1');
      $this->db->where($data);
      $this->db->update($table);
      // user logs
      $log_table = 'logs';

      $log_data = array(
        'user_id' => $this->session->userdata('user_id'),
        'log_action' => 'User was activated.',
        'log_date' => Date("Y-m-d H:i:s")
      );

      $this->db->insert($log_table, $log_data);

      return false;
    }
  }

  public function get_user_data($table, $data) {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($data);
    $get_user_data = $this->db->get()->result();

    return json_encode($get_user_data);
  }

  // main exam functions

  public function new_exam($table, $data) {

    $this->db->select('*');

    $this->db->from($table);
    
    $this->db->where('exam_name', $data['exam_name']); 

    $result = $this->db->get();

    if ($result->num_rows() == 1) {

      return false;

    } else {
      // user logs
      $log_table = 'logs';

      $log_data = array(
        'user_id' => $this->session->userdata('user_id'),
        'log_action' => 'New exam was created.',
        'log_date' => Date("Y-m-d H:i:s")
      );

      $this->db->insert($table, $data);

      $this->db->insert($log_table, $log_data);

      return true;
    }
  }

  public function get_exam_data($table, $data) {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($data);
    $get_exam_data = $this->db->get()->result();

    return json_encode($get_exam_data);
  }

  public function update_exam($table, $data) {
    $this->db->select('exam_name');

    $this->db->from($table);
    
    $this->db->where('exam_id', $data['exam_id']); 

    $get_exam_name = $this->db->get()->row()->exam_name;

    if ($get_exam_name == $data['exam_name']) {
      // user logs
      $log_table = 'logs';

      $log_data = array(
        'user_id' => $this->session->userdata('user_id'),
        'log_action' => 'Exam details was updated.',
        'log_date' => Date("Y-m-d H:i:s")
      );

      $this->db->where('exam_id', $data['exam_id']);
      $this->db->update($table, $data);
      $this->db->insert($log_table, $log_data);

      return true;
    } else {
      $this->db->select('*');

      $this->db->from($table);

      $this->db->where('exam_name', $data['exam_name']);

      $result = $this->db->get();

      if ($result->num_rows() == 1) {

        return false;
  
      } else {
        // user logs
        $log_table = 'logs';
  
        $log_data = array(
          'user_id' => $this->session->userdata('user_id'),
          'log_action' => 'Exam details was updated.',
          'log_date' => Date("Y-m-d H:i:s")
        );
  
        $this->db->where('exam_id', $data['exam_id']);
        $this->db->update($table, $data);
        $this->db->insert($log_table, $log_data);
  
        return true;
      }
    }
  }

  public function assign_user_exam($table, $data) {
    $log_table = 'logs';

    $log_data = array(
      'user_id' => $this->session->userdata('user_id'),
      'log_action' => 'Exam details was updated.',
      'log_date' => Date("Y-m-d H:i:s")
    );

    $this->db->set('has_exam', '1');
    $this->db->where('user_id', $data['user_id']);
    $this->db->update($table);
    $this->db->insert($log_table, $log_data);

    return true;
  }
}