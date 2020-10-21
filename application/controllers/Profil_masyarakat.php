<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Profil_masyarakat extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('m_profil');
      $this->load->model('m_kelurahan');
      $this->load->library('form_validation');
    }

    public function myprofil()
    {
      $data['title'] = 'Profil'; 
      $info['user'] = $this->m_profil->getInfo($this->session->userdata('nik'));
      $info['kelurahan'] = $this->m_kelurahan->daftar_instansi();

      $this->load->view('Masyarakat/templates/header', $data);
      $this->load->view('Masyarakat/templates/sidebar');
      $this->load->view('Masyarakat/templates/topbar');
      $this->load->view('Masyarakat/user/v_detail_profil', $info);
      $this->load->view('Masyarakat/templates/p_footer');
      $this->load->view('Masyarakat/templates/footer');
    }


    //edit profil
    public function edit()
    {
      $data['title'] = 'Profil'; 
      $info['user'] = $this->m_profil->getInfo($this->session->userdata('nik'));
      $info['kelurahan'] = $this->m_kelurahan->daftar_instansi();

      $this->form_validation->set_rules('nama', 'Nama','required');
      $this->form_validation->set_rules('kelurahan','Kelurahan','required');
      $this->form_validation->set_rules('rt', 'Nama RT','required');
      $this->form_validation->set_rules('rw', 'Nama RW','required');   
      $this->form_validation->set_rules('email','Email','required|trim|valid_email');
      $this->form_validation->set_rules('nohp', 'No HP','required');
      $this->form_validation->set_rules('alamat', 'Alamat','required');
        

      if($this->form_validation->run() == FALSE) {
        $this->load->view('Masyarakat/templates/header', $data);
        $this->load->view('Masyarakat/templates/sidebar');
        $this->load->view('Masyarakat/templates/topbar');
        $this->load->view('Masyarakat/user/v_edit_profil', $info);
        $this->load->view('Masyarakat/templates/p_footer');
        $this->load->view('Masyarakat/templates/footer');
      }

      $image = $_FILES['image']['name'];
      
      $nama = $this->input->post('nama');
      $kelurahan = $this->input->post('kelurahan');
      $namart = $this->input->post('rt');
      $namarw = $this->input->post('rw');
      $email = $this->input->post('email');
      $nohp = $this->input->post('nohp');
      $alamat = $this->input->post('alamat');

      if($image==''){

      }else{
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/img/profil';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
              
        if(!$this->upload->do_upload('image')){
          $flag = 1;
        }else{
          $image = $this->upload->data('file_name');
        } 
      }       

      if(($image=='')||($flag ==1)){
        $data = array(
          'nama'   => $nama,
          'kelurahan'  => $kelurahan,
          'nama_rt'  => $namart,
          'nama_rw'  => $namarw,
          'email_msy'  => $email,
          'no_hp'  => $nohp,
          'alamat'  => $alamat
        );
      }
      $data = array(
        'nama'   => $nama,
        'kelurahan'  => $kelurahan,
        'nama_rt'  => $namart,
        'nama_rw'  => $namarw,
        'email_msy'  => $email,
        'no_hp'  => $nohp,
        'alamat'  => $alamat,
        'profil' => $image
      ); 

      $this->db->where('nik', $this->input->post('nik'));
      $this->db->update('masyarakat', $data);
        

      if($flag==1){
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf, Foto tidak berhasil diubah. Ukuran foto terlalu besar</div>');
      }
      
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Anda telah berhasil diubah</div>');
    
    redirect('Profil_Masyarakat/myprofil');
    }  
  }

  public function hapus_akun($nik){
    $where = array('nik' => $nik);
    $this->m_account->hapus_akun($where, 'masyarakat');
    $this->session->unset_userdata('nik');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
    redirect('auth_masyarakat');
  }
}