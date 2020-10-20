<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin'); 
  }

  //fungsi tambah admin
  public function index()
  {
    $data['title'] = 'Administrator';
    $info['admin'] = $this->m_admin->getadmin();

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password','Kata sandi','required|trim|min_length[3]', ['min_length' => 'Kata Sandi terlalu pendek']);
    $this->form_validation->set_rules('email','Email','required|trim|valid_email');

    if($this->form_validation->run() == false){
      $this->load->view('Administrator/templates/auth_header', $data);
      $this->load->view('Administrator/templates/sidebar');
      $this->load->view('Administrator/templates/topbar');
      $this->load->view('Administrator/admin/v_admin', $info);
      $this->load->view('Administrator/templates/p_footer');
      $this->load->view('Administrator/templates/auth_footer');
    } 
      $username = $this->input->post('username');
      $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
      $email = $this->input->post('email');

      $data = array(
        'username'  => $username,
        'password'  => $password,
        'email' => $email
      ); 

      $this->db->insert('administrator', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun telah berhasil dibuat</div>');
      redirect('Administrator/index');       
  }

  //fungsi hapus admin
  public function hapus($username)
  {
    $where = array('username' => $username );
    $this->m_admin->hapus_admin($where, 'administrator');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
    redirect('Administrator/index');
  }
}

