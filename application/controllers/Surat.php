<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
   public function __construct()
    {
        parent::__construct();
        $this->load->model('m_surat'); 
    }

    //tampilan halaman surat
    public function index()
    {
      if($this->session->userdata('username')){
        $data['title'] = 'Daftar Surat';
        $info['jenis_srt'] = $this->m_surat->daftar_surat();

        $this->load->view('Administrator/templates/auth_header', $data);
        $this->load->view('Administrator/templates/sidebar');
        $this->load->view('Administrator/templates/topbar');
        $this->load->view('Administrator/admin/v_daftar_surat', $info);
        $this->load->view('Administrator/templates/p_footer');
        $this->load->view('Administrator/templates/auth_footer');
      }
      else {
        redirect('Auth_admin');
      }
    }

    //tampilan syarat surat
    public function syarat()
    {
      $data['title'] = 'Daftar Surat';
      $id_syarat = $this->uri->segment(3);
      $info['surat'] = $this->m_surat->lihat_syarat($id_syarat);

      $this->load->view('Administrator/templates/auth_header', $data);
      $this->load->view('Administrator/templates/sidebar');
      $this->load->view('Administrator/templates/topbar');
      $this->load->view('Administrator/admin/v_Syarat_Surat', $info);
      $this->load->view('Administrator/templates/p_footer');
      $this->load->view('Administrator/templates/auth_footer');
    }

    //tampilan hapus surat
    public function hapus($id_surat)
    {
      $where = array('id_surat' => $id_surat );
      $this->m_surat->hapus_surat($where, 'jenis_surat');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
      redirect('Surat/index');
    }

    //tampilan edit surat
    public function edit($id_surat)
    {
      $data['title'] = 'Edit Surat'; 
      $id_syarat = $this->uri->segment(3);
      $info['surat'] = $this->m_surat->lihat_syarat($id_syarat);

      $this->form_validation->set_rules('jenis', 'Jenis Surat', 'required');
      $this->form_validation->set_rules('syarat', 'Persyaratan', 'required');
      $this->form_validation->set_rules('biaya', 'Biaya', 'required');
      $this->form_validation->set_rules('waktu','Waktu Penyelesaian','required');
      $this->form_validation->set_rules('produk','Produk Pelayanan','required');

       if($this->form_validation->run() == false){
          $this->load->view('Administrator/templates/auth_header', $data); 
          $this->load->view('Administrator/templates/sidebar');
          $this->load->view('Administrator/templates/topbar');
          $this->load->view('Administrator/admin/v_edit_surat', $info);
          $this->load->view('Administrator/templates/p_footer');
          $this->load->view('Administrator/templates/auth_footer', $info);
        } else{
          $id_surat = $this->input->post('id', true);
          $jenis = $this->input->post('jenis');
          $syarat = $this->input->post('syarat');
          $biaya = $this->input->post('biaya');
          $waktu = $this->input->post('waktu');
          $produk = $this->input->post('produk');

          $data = array(
            'jenis'   => $jenis,
            'syarat'  => $syarat,
            'biaya'  => $biaya,
            'waktu'  => $waktu,
            'produk'  => $produk
          ); 

          $this->db->where('id_surat', $id_surat);
          $this->db->update('jenis_surat', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Jenis surat berhasil diubah.</div>');
          redirect('Surat/index');
      }
    }
  }


