<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class review_model extends CI_Model
{
  public function insert_review($data)
  {
    $this->db->db_debug = false;
    if (!$this->db->insert('review', $data)) {
      $error = $this->db->error();
      return false;
    } else {
      return $this->db->insert_id();
    }
  }
  public function get_userreview($idfilm)
  {
    $query = $this->db->query("SELECT * FROM review, user, film WHERE user.id_user = review.id_user AND film.id_film = review.id_film AND review.id_review = $idfilm");
    $result = $query->num_rows();
    if($result==0){
        return false;        
    } else {
        return $query->result();
    }
  }
  public function get_review()
  {
    $this->db->select('*');
    $this->db->from('review r');
    $this->db->join('user u', 'u.id_user = r.id_user');
    $this->db->join('film f', 'f.id_film = r.id_film');
    $this->db->order_by('r.id_review','desc');         
    $query = $this->db->get();
    return $query->result();
  }
  public function edit_review($id, $review)
  {
    $this->db->db_debug = false;
    $this->db->where('id_review', $id);
    if (!$this->db->update('review', $review)) {
      $error = $this->db->error();
      return false;
    } else {
      $this->db->where('id_review', $id);
      $this->db->update('review', array('edited'=> true));
      return true;
    }
  }
  public function delete_review($id)
  {
    $this->db->db_debug = false;
    if (!$this->db->delete('review', array('id_review'=>$id))) {
      $error = $this->db->error();
      return false;
    } else {
      return true;
    }
  }
}
