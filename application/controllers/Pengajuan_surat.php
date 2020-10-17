<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_surat extends CI_Controller {
   public function __construct()
    {
      parent::__construct();
      $this->load->model('m_surat'); 
      $this->load->model('m_profil');
      $this->load->library('upload');
      $this->load->helper('download');
    }

    public function index()
    {
      if($this->session->userdata('nik')){
        $data['title'] = 'Daftar Surat';

        $info['jenis_srt'] = $this->m_surat->daftar_surat();

          $this->load->view('Masyarakat/templates/header', $data);
          $this->load->view('Masyarakat/templates/sidebar');
          $this->load->view('Masyarakat/templates/topbar');
          $this->load->view('Masyarakat/surat/v_pengajuan_surat', $info);
          $this->load->view('Masyarakat/templates/p_footer');
          $this->load->view('Masyarakat/templates/footer');
      } 
      else {
        redirect('Auth_Masyarakat');
      }
    }

    public function syarat()
    {
      if($this->session->userdata('nik')){
        $data['title'] = 'Daftar Surat';
        $id = $this->uri->segment(3);
        $info['jenis_srt'] = $this->m_surat->lihat_syarat($id);

        $this->load->view('Masyarakat/templates/header', $data);
        $this->load->view('Masyarakat/templates/sidebar');
        $this->load->view('Masyarakat/templates/topbar');

        switch($id){
          case '1':
            $this->load->view('Masyarakat/surat/v_BDT', $info);
            break;
          case '2':
            $this->load->view('Masyarakat/surat/v_KTP_Baru', $info);
            break;
          case '3' :
            $this->load->view('Masyarakat/surat/v_KK_Baru', $info);
            break;
          case '4':
            $this->load->view('Masyarakat/surat/v_Akte_Lahir', $info);
            break;
          case '5':
            $this->load->view('Masyarakat/surat/v_SK_Kematian', $info);
            break;
          case '6':
            $this->load->view('Masyarakat/surat/v_SKCK', $info);
            break;
          case '7':
            $this->load->view('Masyarakat/surat/v_Domisili_Tempat_Tinggal', $info);
            break;
          case '8':
            $this->load->view('Masyarakat/surat/v_Domisili_Usaha', $info);
            break;
          case '9':
            $this->load->view('Masyarakat/surat/v_SK_Usaha', $info);
            break;
          case '10':
            $this->load->view('Masyarakat/surat/v_SK_Pindah_Datang', $info);
            break;
          case '11':
            $this->load->view('Masyarakat/surat/v_SK_Pindah_Keluar', $info);
            break;
          case '12':
            $this->load->view('Masyarakat/surat/v_SK_Waris', $info);
            break;
          case '13':
            $this->load->view('Masyarakat/surat/v_SK_Nikah', $info);
            break;
        }
        $this->load->view('Masyarakat/templates/p_footer');
        $this->load->view('Masyarakat/templates/footer');
      } 
      else{
        redirect('Auth_Masyarakat');
      }
    }

    public function bdt(){
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      $this->upload->do_upload('image1');
      $data ['berkas1'] = $this->upload->data('file_name');
      $data ['id_surat'] = '1';
      $data['nik'] = $this->session->userdata('nik');
      $data['keterangan'] = $this->input->post('keterangan');
      $data['tanggal'] = tanggal();

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function ktp_baru(){
      $berkas = $_FILES['berkas1']['name'];
      
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($berkas == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $data ['id_surat'] = '2';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } else {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas');
        $data ['berkas2'] = $this->upload->data('file_name');
        $data ['id_surat'] = '2';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      }

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function kk_baru(){
      $berkas = $_FILES['berkas1']['name'];
      
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($berkas == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $data ['id_surat'] = '3';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } 
      else {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas1');
        $data ['berkas2'] = $this->upload->data('file_name');
        $data['nik'] = $this->session->userdata('nik');
        $data ['id_surat'] = '3';
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      }

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function akte_lahir(){
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      $this->upload->do_upload('image1');
      $data ['berkas1'] = $this->upload->data('file_name');
      $this->upload->do_upload('image2');
      $data ['berkas2'] = $this->upload->data('file_name');
      $this->upload->do_upload('image3');
      $data ['berkas3'] = $this->upload->data('file_name');
      $this->upload->do_upload('image4');
      $data ['berkas4'] = $this->upload->data('file_name');
      $this->upload->do_upload('image5');
      $data ['berkas5'] = $this->upload->data('file_name');

      $data ['id_surat'] = '4';
      $data['nik'] = $this->session->userdata('nik');
      $data['tanggal'] = tanggal();
      $data['keterangan'] = $this->input->post('keterangan');

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function sk_kematian(){
      $berkas1 = $_FILES['berkas1']['name'];
      $berkas2 = $_FILES['berkas2']['name'];
      $berkas3 = $_FILES['berkas3']['name'];
      
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($berkas1 == '' and $berkas2 == '' and $berkas3 = '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $data ['id_surat'] = '5';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } 
      else if ($berkas2 == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas1');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas3');
        $data ['berkas3'] = $this->upload->data('file_name');
        $data ['id_surat'] = '5';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
        } 
        else if ($berkas2 == ''){
          $this->upload->do_upload('image1');
          $data ['berkas1'] = $this->upload->data('file_name');
          $this->upload->do_upload('berkas1');
          $data ['berkas2'] = $this->upload->data('file_name');
          $this->upload->do_upload('berkas3');
          $data ['berkas3'] = $this->upload->data('file_name');
          $data ['id_surat'] = '5';
          $data['nik'] = $this->session->userdata('nik');
          $data['tanggal'] = tanggal();
          $data['keterangan'] = $this->input->post('keterangan');
        } 
        else if ($berkas3 == '') {
          $this->upload->do_upload('image1');
          $data ['berkas1'] = $this->upload->data('file_name');
          $this->upload->do_upload('berkas1');
          $data ['berkas2'] = $this->upload->data('file_name');
          $this->upload->do_upload('berkas2');
          $data ['berkas3'] = $this->upload->data('file_name');
          $data ['id_surat'] = '5';
          $data['nik'] = $this->session->userdata('nik');
          $data['tanggal'] = tanggal();
          $data['keterangan'] = $this->input->post('keterangan');
        } 
        else if ($berkas1 == '' and $berkas2 == '') {
          $this->upload->do_upload('image1');
          $data ['berkas1'] = $this->upload->data('file_name');
          $this->upload->do_upload('berkas3');
          $data ['berkas2'] = $this->upload->data('file_name');
          $data ['id_surat'] = '5';
          $data['nik'] = $this->session->userdata('nik');
          $data['tanggal'] = tanggal();
          $data['keterangan'] = $this->input->post('keterangan');
        } 
        else {
          $this->upload->do_upload('image1');
          $data ['berkas1'] = $this->upload->data('file_name');
          $this->upload->do_upload('berkas1');
          $data ['berkas2'] = $this->upload->data('file_name');
          $this->upload->do_upload('berkas2');
          $data ['berkas3'] = $this->upload->data('file_name');
          $this->upload->do_upload('berkas3');
          $data ['berkas4'] = $this->upload->data('file_name');
          $data ['id_surat'] = '5';
          $data['nik'] = $this->session->userdata('nik');
          $data['tanggal'] = tanggal();
          $data['keterangan'] = $this->input->post('keterangan');
        }

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }
    
    public function skck(){
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      $this->upload->do_upload('image1');
      $data ['berkas1'] = $this->upload->data('file_name');
      $data ['id_surat'] = '6';
      $data['nik'] = $this->session->userdata('nik');
      $data['tanggal'] = tanggal();
      $data['keterangan'] = $this->input->post('keterangan');

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function domisili_tempat_tinggal(){
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      $this->upload->do_upload('image1');
      $data ['berkas1'] = $this->upload->data('file_name');
      $data ['id_surat'] = '7';
      $data['nik'] = $this->session->userdata('nik');
      $data['keterangan'] = $this->input->post('keterangan');
      $data['tanggal'] = tanggal();

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function domisili_usaha(){
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      $this->upload->do_upload('image1');
      $data ['berkas1'] = $this->upload->data('file_name');
      $data ['id_surat'] = '8';
      $data['nik'] = $this->session->userdata('nik');
      $data['keterangan'] = $this->input->post('keterangan');
      $data['tanggal'] = tanggal();

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function SK_usaha(){
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      $this->upload->do_upload('image1');
      $data ['berkas1'] = $this->upload->data('file_name');
      $data ['id_surat'] = '9';
      $data['nik'] = $this->session->userdata('nik');
      $data['keterangan'] = $this->input->post('keterangan');
      $data['tanggal'] = tanggal();

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function pindah_datang(){
      $berkas1 = $_FILES['berkas1']['name'];
      $berkas2 = $_FILES['berkas2']['name'];
      $berkas3 = $_FILES['berkas3']['name'];
      $berkas4 = $_FILES['berkas4']['name'];

      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($berkas1 == '' and $berkas2 == '' and $berkas3 == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas4');
        $data ['berkas3'] = $this->upload->data('file_name');
        $data ['id_surat'] = '10';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } else if($berkas2 == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas1');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas3');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas4');
        $data ['berkas5'] = $this->upload->data('file_name');
        $data ['id_surat'] = '10';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } else if ($berkas4 ==''){
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas1');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas2');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas3');
        $data ['berkas5'] = $this->upload->data('file_name');
        $data ['id_surat'] = '10';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } else if ($berkas1 == '' and $berkas3 == '' and $berkas4 == ''){
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas2');
        $data ['berkas3'] = $this->upload->data('file_name');
        $data ['id_surat'] = '10';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      }
      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function pindah_keluar(){
      $berkas1 = $_FILES['berkas1']['name'];
      $berkas2 = $_FILES['berkas2']['name'];

      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($berkas1 == '' and $berkas2 == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $data ['id_surat'] = '11';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } else {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
         $this->upload->do_upload('berkas1');
        $data ['berkas3'] = $this->upload->data('file_name');
         $this->upload->do_upload('berkas2');
        $data ['berkas4'] = $this->upload->data('file_name');
        $data ['id_surat'] = '11';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      }
      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function sk_waris(){
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      $this->upload->do_upload('image1');
      $data ['berkas_1'] = $this->upload->data('file_name');
      $this->upload->do_upload('image2');
      $data ['berkas2'] = $this->upload->data('file_name');
      $this->upload->do_upload('image3');
      $data ['berkas3'] = $this->upload->data('file_name');

      $data ['id_surat'] = '12';
      $data['nik'] = $this->session->userdata('nik');
      $data['tanggal'] = tanggal();
      $data['keterangan'] = $this->input->post('keterangan');

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function download_sp_waris(){
      force_download('assets/SK Waris.docx', NULL);
    }

    public function sk_nikah(){
      $berkas1 = $_FILES['berkas1']['name'];
      $berkas2 = $_FILES['berkas2']['name'];
      $berkas3 = $_FILES['berkas3']['name'];
      $berkas4 = $_FILES['berkas4']['name'];
      $berkas5 = $_FILES['berkas5']['name'];
      
      $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
      $config['max_size'] = '12048';
      $config['upload_path'] = './assets/img/permohonan';
      $config['encrypt_name'] = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if($berkas1 == '' and $berkas2 == '' and $berkas3 == '' and $berkas4 == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('image3');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('image4');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('image5');
        $data ['berkas5'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas5');
        $data ['berkas6'] = $this->upload->data('file_name');
        $data ['id_surat'] = '13';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } 
      else if($berkas2 == '' and $berkas3 == '' and $berkas4 == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('image3');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('image4');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('image5');
        $data ['berkas5'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas1');
        $data ['berkas6'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas5');
        $data ['berkas7'] = $this->upload->data('file_name');
        $data ['id_surat'] = '13';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
        } 
        else if($berkas1 == '' and $berkas3 == '' and $berkas4 =='') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('image3');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('image4');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('image5');
        $data ['berkas5'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas2');
        $data ['berkas6'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas5');
        $data ['berkas7'] = $this->upload->data('file_name');
        $data ['id_surat'] = '13';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
        } 
        else if($berkas3 == '' and $berkas4 == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('image3');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('image4');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('image5');
        $data ['berkas5'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas1');
        $data ['berkas6'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas2');
        $data ['berkas7'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas5');
        $data ['berkas8'] = $this->upload->data('file_name');
        $data ['id_surat'] = '13';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } 
      else if($berkas1 == '' and $berkas2 == '' and $berkas5 =='') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('image3');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('image4');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('image5');
        $data ['berkas5'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas3');
        $data ['berkas6'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas4');
        $data ['berkas7'] = $this->upload->data('file_name');
        $data ['id_surat'] = '13';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } 
      else if($berkas2 == '' and $berkas5 == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('image3');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('image4');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('image5');
        $data ['berkas5'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas1');
        $data ['berkas6'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas3');
        $data ['berkas7'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas4');
        $data ['berkas8'] = $this->upload->data('file_name');
        $data ['id_surat'] = '13';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } 
      else if($berkas1 == '' and $berkas5 == '') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('image3');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('image4');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('image5');
        $data ['berkas5'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas2');
        $data ['berkas6'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas3');
        $data ['berkas7'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas4');
        $data ['berkas8'] = $this->upload->data('file_name');
        $data ['id_surat'] = '13';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } 
      else if ($berkas5 =='') {
        $this->upload->do_upload('image1');
        $data ['berkas1'] = $this->upload->data('file_name');
        $this->upload->do_upload('image2');
        $data ['berkas2'] = $this->upload->data('file_name');
        $this->upload->do_upload('image3');
        $data ['berkas3'] = $this->upload->data('file_name');
        $this->upload->do_upload('image4');
        $data ['berkas4'] = $this->upload->data('file_name');
        $this->upload->do_upload('image5');
        $data ['berkas5'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas1');
        $data ['berkas6'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas2');
        $data ['berkas7'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas3');
        $data ['berkas8'] = $this->upload->data('file_name');
        $this->upload->do_upload('berkas4');
        $data ['berkas9'] = $this->upload->data('file_name');
        $data ['id_surat'] = '13';
        $data['nik'] = $this->session->userdata('nik');
        $data['tanggal'] = tanggal();
        $data['keterangan'] = $this->input->post('keterangan');
      } 

      $this->db->insert('permohonan_surat', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Permohonan Surat Pengantar Berhasil Diajukan</div>');
      echo json_encode($this->upload->display_errors());
    }

    public function download_sp_nikah(){
      force_download('assets/SK Nikah.docx', NULL);
    }

    public function hapus_pengajuan($id_surat_masuk){
      $where = array('id_surat_masuk' => $id_surat_masuk);
      $this->m_surat->hapus_surat($where, 'permohonan_surat');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
      redirect('Cek_Status/index');
    }


}