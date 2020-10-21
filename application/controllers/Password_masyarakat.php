<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Password_Masyarakat extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('m_profil');
      $this->load->model('m_account');
      $this->load->library('form_validation');
    }

    public function index()
    {
      $data['title'] = 'Ubah Kata Sandi'; 
      $info['user'] = $this->m_profil->getPassword($this->session->userdata('nik'));

      $this->form_validation->set_rules('password', 'Kata Sandi','required|trim');
      $this->form_validation->set_rules('password1','Kata sandi baru','required|trim|min_length[3]', ['min_length' => 'Kata sandi terlalu pendek']);
      $this->form_validation->set_rules('password2','Konfirmasi kata sandi','required|matches[password1]', ['matches' => 'Kata sandi tidak sama' ]);

      if($this->form_validation->run() == FALSE) {
        $this->load->view('Masyarakat/templates/header', $data);
        $this->load->view('Masyarakat/templates/sidebar');
        $this->load->view('Masyarakat/templates/topbar');
        $this->load->view('Masyarakat/user/v_pass', $info);
        $this->load->view('Masyarakat/templates/p_footer');
        $this->load->view('Masyarakat/templates/footer');
      }
      
      $password = $this->input->post('password');
      $password1 = $this->input->post('password1');

      if(!password_verify($password, $info['user']['password'])){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi yang dimasukkan salah</div>');
        redirect('Password_Masyarakat');
      } 

      if($password == $password1){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi sama dengan yang digunakan saat ini</div>');
        redirect('Password_Masyarakat');
      }
      
      $password_hash = password_hash($password1, PASSWORD_DEFAULT);
      $this->db->set('password', $password_hash);
      $this->db->where('nik', $this->session->userdata('nik'));
      $this->db->update('masyarakat');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata Sandi berhasil diubah</div>');
      redirect('Password_Masyarakat');
      }
    }
  } 