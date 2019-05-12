<?php

class Login_Model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function check_user($table, $data) {

    $this->db->select('*');

    $this->db->from($table);

    $this->db->where($data);

    $this->db->limit(1);

    $result = $this->db->get();

    if ($result->num_rows() === 1) {
      return $result->result();
    } else {
      return false;
    }
  }
  
}