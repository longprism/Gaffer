<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('id_user')) {
      redirect(base_url('home'), 'refresh');
    }
    $this->load->library('encryption');
    $this->load->model('register_model');
  }
  public function checking()
  {
    if (strlen($this->input->post('password'))<7) {
      $nmr = 2;
      redirect(base_url()."register/index/".$nmr);
    }
    $encrypt = $this->encryption->encrypt($this->input->post('password'));
    $data = array(
      'username' => $this->input->post('username'),
      'role' => $this->input->post('role'),
      'profilep' => 'img/default-user-image.png',
      'password' => $encrypt
    );
    $id = $this->register_model->insert_data($data);
    if (!$id) {
      $this->index(1);
    } else {
      $this->success(3);
    }
  }
  public function success($id)
  {
    redirect(base_url()."login/index/".$id);
  }
	public function index()
	{
    $data['msg'] = (func_num_args()>0)?func_get_arg(0):null;
		$this->load->view('register', $data);
	}
}
