 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Konten extends CI_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->model('m_konten'); 
        $this->load->helper('text');
    } 

    public function index() {
      if($this->session->userdata('username')){
        $data['title'] = 'Konten Informasi';
        $info['konten'] = $this->m_konten->isi_konten();

        $this->load->view('Administrator/templates/auth_header', $data);
        $this->load->view('Administrator/templates/sidebar');
        $this->load->view('Administrator/templates/topbar');
        $this->load->view('Administrator/admin/v_Konten_Informasi', $info);
        $this->load->view('Administrator/templates/p_footer');
        $this->load->view('Administrator/templates/auth_footer');
      }
      redirect('Auth_admin');
    }

    //fungsi hapus konten
    public function hapus($id_konten)
    {
      $where = array('id_konten' => $id_konten );
      $this->m_konten->hapus_konten($where, 'konten_informasi');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
      redirect('Konten/index');
    }

    //fungsi edit konten
    public function edit($id_konten)
    {
      $data['title'] = 'Edit Konten'; 
      $id_konten = $this->uri->segment(3);
      $info['konten'] = $this->m_konten->lihat_konten($id_konten);

      $this->form_validation->set_rules('konten', 'Nama Konten', 'required');
      $this->form_validation->set_rules('isi', 'Isi Konten', 'required');
     

      if($this->form_validation->run() == false){
        $this->load->view('Administrator/templates/auth_header', $data); 
        $this->load->view('Administrator/templates/sidebar');
        $this->load->view('Administrator/templates/topbar');
        $this->load->view('Administrator/admin/v_Edit_Konten', $info);
        $this->load->view('Administrator/templates/p_footer');
        $this->load->view('Administrator/templates/auth_footer', $info);
      } 
      else{
        $id_konten = $this->input->post('id_konten', true);
        $konten = $this->input->post('konten');
        $isi = $this->input->post('isi'); 

        $data = array(
          'nama_konten' => $konten,
          'isi_konten'  => $isi
        ); 

        $this->db->where('id_konten', $id_konten);
        $this->db->update('konten_informasi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Konten berhasil diubah.</div>');
        redirect('Konten/index');
      }
    }

    //fungsi tambah konten
    public function add()
    {
      $data['title'] = 'Tambah Konten'; 

      $this->form_validation->set_rules('konten', 'Nama Konten', 'required');
      $this->form_validation->set_rules('isi', 'Isi Konten', 'required');
       
      if($this->form_validation->run() == false){
       $this->load->view('Administrator/templates/auth_header', $data); 
       $this->load->view('Administrator/templates/sidebar');
       $this->load->view('Administrator/templates/topbar');
       $this->load->view('Administrator/admin/v_Tambah_Konten');
       $this->load->view('Administrator/templates/p_footer');
       $this->load->view('Administrator/templates/auth_footer');
      } 
      else{
       $konten = $this->input->post('konten');
       $isi = $this->input->post('isi');

       $data = array(
         'nama_konten' => $konten,
         'isi_konten'  => $isi
       ); 

       $this->db->insert('konten_informasi', $data);
       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Konten berhasil ditambahkan</div>');
       redirect('Konten/index');
      }        
    }
  }

  