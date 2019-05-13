<?php

class Dashboard_Model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

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

  public function new_user($table, $data) {
    // print_r($data['user_type']);

    $this->db->select('*');

    $this->db->from($table);
    
    $this->db->where('user_email',$data['user_email']); 

    $result = $this->db->get();

    if ($result->num_rows() == 1) {
      return false;
    } else {
      $this->db->insert($table, $data);

      return true;
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

      return true;
    } else {
      $this->db->set('user_active', '1');
      $this->db->where($data);
      $this->db->update($table);

      return false;
    }
  }
}