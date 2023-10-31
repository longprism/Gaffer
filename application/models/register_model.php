<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

  public function insert_data($data)
  {
    $this->db->db_debug = false;
    if (!$this->db->insert('user', $data)) {
      $error = $this->db->error();
      return false;
    } else {
      return $this->db->insert_id();
    }
  }
}
