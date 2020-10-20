<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Password_admin extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('m_admin');
      $this->load->library('form_validation');
    }

    public function index()
    {
      $data['title'] = 'Ganti Kata Sandi'; 
      $info['admin'] = $this->m_admin->getdata($this->session->userdata('username'));

  
      $this->form_validation->set_rules('password', 'Kata Sandi','required|trim');
      $this->form_validation->set_rules('password1','Kata sandi baru','required|trim|min_length[3]', ['min_length' => 'Kata sandi terlalu pendek']);
      $this->form_validation->set_rules('password2','Konfirmasi kata sandi','required|matches[password1]', ['matches' => 'Kata sandi tidak sama' ]);

      if($this->form_validation->run() == FALSE) {
        $this->load->view('Administrator/templates/auth_header', $data);
        $this->load->view('Administrator/templates/sidebar');
        $this->load->view('Administrator/templates/topbar');
        $this->load->view('Administrator/admin/v_ganti_password', $info);
        $this->load->view('Administrator/templates/p_footer');
        $this->load->view('Administrator/templates/auth_footer');
      }
        $password = $this->input->post('password');
        $password1 = $this->input->post('password1');

        if(!password_verify($password, $info['admin']['password'])){
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi yang dimasukkan salah</div>');
          redirect('Password_admin');
        } else{

          if($password == $password1){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi sudah pernah digunakan</div>');
          redirect('Password_admin');
          }
            $password_hash = password_hash($password1, PASSWORD_DEFAULT);
            $this->db->set('password', $password_hash);
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('administrator');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata Sandi berhasil diubah</div>');
            redirect('Password_admin');
        }
      }
    }
  } 