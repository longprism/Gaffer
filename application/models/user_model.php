<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {
  public function get_userdata($id)
  {
    $this->db->where('id_user', $id);
    $query = $this->db->get('user');
    return $query->result();
  }
  public function get_alluser($id)
  {
    $this->db->not_like('id_user', $id);
    $query = $this->db->get('user');
    return $query->result();
  }
}
