<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

  public function login_check($username, $password)
  {
    $this->db->where('username', $username);
    $query = $this->db->get('user');
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $stored_pass = $this->encryption->decrypt($row->password);
        if ($password == $stored_pass) {
          $this->session->set_userdata('id_user', $row->id_user);
        } else {
          return 2;
        }
      }
    } else {
      return 1;
    }
  }
}
