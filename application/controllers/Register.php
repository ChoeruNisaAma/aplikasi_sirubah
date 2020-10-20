 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Register extends CI_Controller {
     
     function __construct(){
         parent::__construct();
         $this->load->library(array('form_validation'));
         $this->load->helper(array('url','form'));
         $this->load->model('m_kelurahan');
     } 
 
     public function index() {
        if($this->session->userdata('nik')){
            redirect('Page_Masyarakat');
        }
        
        $data['title'] = 'Daftar Akun';
        $info['kelurahan'] = $this->m_kelurahan->daftar_instansi();
        
        $this->form_validation->set_rules('name', 'Nama','required');
        $this->form_validation->set_rules('nik', 'NIK','required|trim|numeric|is_unique[masyarakat.nik]', ['is_unique' => 'NIK telah digunakan' ]);
        $this->form_validation->set_rules('password1','Kata sandi','required|trim|min_length[3]', ['min_length' => 'Kata Sandi terlalu pendek']);
        $this->form_validation->set_rules('password2','Konfirmasi kata sandi','required|matches[password1]', ['matches' => 'Kata sandi tidak sama' ]);
        $this->form_validation->set_rules('kelurahan','Kelurahan','required');
        $this->form_validation->set_rules('rt', 'Nama RT','required');
        $this->form_validation->set_rules('rw', 'Nama RW','required');   
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('nohp', 'No HP','required');
        $this->form_validation->set_rules('alamat', 'Alamat','required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('Masyarakat/templates/header', $data);
            $this->load->view('Masyarakat/account/v_register', $info);
            $this->load->view('Masyarakat/templates/footer');
        }
            $image = $_FILES['image']['name'];

            if($image==''){
                $this->form_validation->set_rules('image', 'Scan KTP','required');
                $this->load->view('Masyarakat/templates/header', $data);
                $this->load->view('Masyarakat/account/v_register', $info);
                $this->load->view('Masyarakat/templates/footer');

            }
                $nama = htmlspecialchars($this->input->post('name', true));
                $nik = htmlspecialchars($this->input->post('nik', true));
                $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                $kelurahan = $this->input->post('kelurahan');
                $nama_rt = $this->input->post('rt');
                $nama_rw = $this->input->post('rw');
                $email = $this->input->post('email');
                $no_hp = $this->input->post('nohp');
                $alamat = $this->input->post('alamat');

                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profil';
                $config['encrypt_name'] = TRUE;
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if(!$this->upload->do_upload('image')){
                    $this->form_validation->set_rules('image', 'Scan KTP','max');
                    $this->load->view('Masyarakat/templates/header', $data);
                    $this->load->view('Masyarakat/account/v_register', $info);
                    $this->load->view('Masyarakat/templates/footer');
                }
                    $image = $this->upload->data('file_name');
                    $data = array(
                        'nama' => $nama,
                        'nik' => $nik,
                        'password' => $password,
                        'kelurahan' => $kelurahan,
                        'nama_rt' => $nama_rt,
                        'nama_rw' => $nama_rw,
                        'email_msy' => $email,
                        'no_hp' => $no_hp,
                        'alamat' => $alamat,
                        'foto_ktp' => $image,
                        'profil' => 'default.jpg'
                    );
                    
                $this->m_account->daftar($data);
                
            
        
    }
}



