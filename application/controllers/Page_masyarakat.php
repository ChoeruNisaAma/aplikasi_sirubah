 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Page_Masyarakat extends CI_Controller {
     public function __construct()
     {
        parent::__construct();
        $this->load->model('m_page');
     }

     public function index() {
          if($this->session->userdata('nik')){
               $data['title'] = 'Halaman Utama';
               $info['user'] = $this->db->get_where('masyarakat', ['nik' => $this->session->userdata('nik')])->row_array();
               $info['page'] = $this->m_page->isi_page();

               $this->load->view('Masyarakat/templates/header', $data);
               $this->load->view('Masyarakat/templates/sidebar');
               $this->load->view('Masyarakat/templates/topbar');
               $this->load->view('Masyarakat/user/v_page', $info);
               $this->load->view('Masyarakat/templates/p_footer');
               $this->load->view('Masyarakat/templates/footer');
          } 
          else {
               redirect('Auth_Masyarakat');
          }
     }
 }
