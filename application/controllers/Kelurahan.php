<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_kelurahan'); 
  }

  //fungsi tambah Kelurahan
  public function index()
  {
    if($this->session->userdata('username')){
      $data['title'] = 'Daftar Kelurahan';
      $info['instansi'] = $this->m_kelurahan->daftar_instansi();

      $this->form_validation->set_rules('instansi', 'Instansi', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password','Kata sandi','required|trim|min_length[3]', ['min_length' => 'Kata Sandi terlalu pendek']);
      $this->form_validation->set_rules('kontak','Kontak','required|trim');

      if($this->form_validation->run() == false){
        $this->load->view('Administrator/templates/auth_header', $data);
        $this->load->view('Administrator/templates/sidebar');
        $this->load->view('Administrator/templates/topbar');
        $this->load->view('Administrator/admin/v_Kelurahan', $info);
        $this->load->view('Administrator/templates/p_footer');
        $this->load->view('Administrator/templates/auth_footer');
      } 
        $instansi = $this->input->post('instansi');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $kontak = $this->input->post('kontak');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = array(
          'nik_pengurus'=>'kelurahan',
          'status'=>'1',
          'jabatan'=>'kel',
          'kel'=>'0',
          'nama_pengurus'=> $instansi,
          'lokasi' => $alamat,
          'username' => $username,
          'kontak' => $kontak,
          'password' => $password
        ); 

        $this->db->insert('pengurus', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Anda telah berhasil diubah</div>');
        redirect('Kelurahan/index');
            
    }

      redirect('Auth_admin');

  }

  //fungsi hapus kelurahan
  public function hapus($id_kelurahan)
  {
    $where = array('id' => $id_kelurahan );
    $this->m_kelurahan->hapus_data($where, 'pengurus');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
    redirect('Kelurahan/index');
  }
}

