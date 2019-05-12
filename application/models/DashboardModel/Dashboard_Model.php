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

    $result = $this->db->get();

    return $result->result();
  }
}