<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class movie_model extends CI_Model {
  public function add_movie($data)
  {
    $this->db->insert('film', $data);
  }
  public function get_movies()
  {
    $query = $this->db->get('film');
    return $query->result();
  }
}
