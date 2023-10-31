<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('id_user')) {
      redirect(base_url('login'));
    }
    $this->load->model('movie_model');
    $this->load->model('user_model');
    $this->load->model('review_model');    
  }
  public function addmovies()
  {
    $config['upload_path']          = './asset/img/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100000;  
    $this->load->library('upload', $config);  
    if (!$this->upload->do_upload('poster')){
			$error = array('error' => $this->upload->display_errors());
      $msg=1;
			redirect(base_url('home/movies/').$msg);
    } else {
      $temp = $this->upload->data();
      $data_p = $temp['file_name'];
    }
    if (!$this->upload->do_upload('screenshot')){
			$error = array('error' => $this->upload->display_errors());
      $msg=2;
			redirect(base_url('home/movies/').$msg);
    } else {
      $temp = $this->upload->data();
      $data_s = $temp['file_name'];
    }
    if (isset($data_p) && isset($data_s)) {
      $data = array(
        'judul_film' => $this->input->post('judul-film'),
        'direktor' => $this->input->post('direktor'),
        'tahun' => $this->input->post('tahun'),
        'sinopsis' => $this->input->post('sinopsis'),
        'poster' => $data_p,
        'screenshot' => $data_s
      );
      $this->movie_model->add_movie($data);
      redirect(base_url());
    } else {
      $msg=3;
			redirect(base_url('home/movies/').$msg);
    }
  }
  public function addreview()
  {
    $data = array(
      'review' => $this->input->post('review'),
      'id_user' => $this->input->post('id-user'),
      'id_film' => $this->input->post('id-movie')
    );
    if (!$this->review_model->insert_review($data)) {
      $msg=1;
      redirect(base_url('home/review/').$msg);
    } else {
      redirect(base_url());
    }
  }
  public function index()
  {
    $id = $this->session->userdata('id_user');
    $data['review'] = $this->review_model->get_review();
    $data['users'] = $this->user_model->get_alluser($id);
    shuffle($data['users']);
    $data['userdata'] = $this->user_model->get_userdata($id);
    $data['movies'] = $this->movie_model->get_movies();
    shuffle($data['movies']);
    $this->load->view('home', $data);
  }
  public function movies()
  {
    $id = $this->session->userdata('id_user');
    $data['userdata'] = $this->user_model->get_userdata($id);
    $data['msg'] = (func_num_args()>0)?func_get_arg(0):null;
    $this->load->view('movies', $data);
  }
  public function review()
  {
    $id = $this->session->userdata('id_user');
    $data['userdata'] = $this->user_model->get_userdata($id);
    $data['movies'] = $this->movie_model->get_movies();
    $this->load->view('review', $data);
  }
  public function review_edit($idfilm)
  {
    $id = $this->session->userdata('id_user');
    $data['userdata'] = $this->user_model->get_userdata($id);
    $data['review'] = $this->review_model->get_userreview($idfilm);
    $this->load->view('review_edit', $data);
  }
  public function edit()
  {
    $review = array('review' => $this->input->post('review'));
    $confirm = $this->review_model->edit_review($this->input->post('id-review'), $review);
    if ($confirm) {
      redirect(base_url());
    } else {
      $msg=1;
      redirect(base_url('home/review_edit/'.$msg));
    }
  }
  public function delete($id)
  {
    if ($this->review_model->delete_review($id)) {
      redirect(base_url());
    }
  }
  public function logout()
  {
    $data = $this->session->all_userdata();
    foreach ($data as $row => $rows_value) {
      $this->session->unset_userdata($row);
    }
    redirect(base_url('home'));
  }
}
