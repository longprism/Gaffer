<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('id_user')) {
      redirect(base_url('home'), 'refresh');
    }
    $this->load->library('encryption');
    $this->load->model('login_model');
  }
  public function checking()
  {
    $hasil = $this->login_model->login_check($this->input->post('username'), $this->input->post('password'));
    if ($hasil == '') {
      redirect(base_url('home'));
    } else {
      redirect(base_url().'login/index/'.$hasil);
    }
  }
  public function index()
	{		
    $data['msg'] = (func_num_args()>0)?func_get_arg(0):null;
    $this->load->view('login', $data);
	}
}
