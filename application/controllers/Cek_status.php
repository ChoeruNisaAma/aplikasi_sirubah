<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_status extends CI_Controller {
  public function __construct()
    {
      parent::__construct();
      $this->load->model('m_surat');
    }

  public function index()
  {
    if($this->session->userdata('nik')){
      $data['title'] = 'Status Permohonan'; 
      $info['surat_masuk'] = $this->m_surat->surat_masuk($this->session->userdata('nik'));
      $info['surat_ditolak'] = $this->m_surat->surat_ditolak($this->session->userdata('nik'));
      $info['surat_selesai'] = $this->m_surat->surat_selesai($this->session->userdata('nik'));

      $this->load->view('Masyarakat/templates/header', $data);
      $this->load->view('Masyarakat/templates/sidebar');
      $this->load->view('Masyarakat/templates/topbar');
      $this->load->view('Masyarakat/user/v_cek_status', $info);
      $this->load->view('Masyarakat/templates/p_footer');
      $this->load->view('Masyarakat/templates/footer');
    } 
    else {
      redirect('Auth_Masyarakat');
    } 
         // var_dump($this->m_surat->surat_masuk($this->session->userdata('nik'))); die;
  }
}

