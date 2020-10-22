<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_masyarakat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_account');
        $this->load->model('m_profil');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('nik')){
            redirect('Page_Masyarakat');
        }

        $data['title'] = 'Halaman Masuk';

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric', ['numeric' => 'NIK harus berisi angka']);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Masyarakat/templates/header', $data);
            $this->load->view('Masyarakat/account/v_login');
            $this->load->view('Masyarakat/templates/footer');
        } 
        
        $this->auth();
    }

    private function auth()
    {
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');
        $user = $this->db->get_where('masyarakat', ['nik' => $nik])->row_array();

        if($user){
            if(password_verify($password, $user['password'])){
                $data = [
                    'nik' => $user['nik'],
                    'nama' => $user['nama'],
                    'foto_ktp' => $user['foto_ktp'],
                    'profil' => $user['profil']
                ];
                $this->session->set_userdata($data);
                redirect('Page_Masyarakat');
            }
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Kata Sandi salah</div>');
            redirect('Auth_Masyarakat');
        }
        
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIK belum terdaftar</div>');
        redirect('Auth_Masyarakat');
    }



    public function logout()
    {
        $this->session->unset_userdata('nik');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar</div>');
        redirect('Auth_Masyarakat');
    }


    public function lupa_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false){
            $data['title'] = 'Reset Kata Sandi';
            $this->load->view('Masyarakat/templates/header', $data);
            $this->load->view('Masyarakat/account/v_email');
            $this->load->view('Masyarakat/templates/footer');
        } 
            $email = $this->input->post('email');
            $user = $this->db->get_where('masyarakat', ['email_msy' => $email]) -> row_array();

            if($user){
                $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'date_created' => tanggal()
                    ];
                $this->db->insert('user_token', $user_token);
                if(!$this->_kirimEmail($token)){
                    return $this->email->print_debugger();
                }

                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Silahkan cek email Anda untuk ganti kata sandi!</div>');
                redirect('Auth_Masyarakat');

            }
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
                redirect('Auth_Masyarakat');
    }

    public function reset_password(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('masyarakat', ['email_msy => $email'])->row_array();

        if($user){
            $user_token = $this->db->get_where('user_token', ['token'=> $token])->row_array();
            if($user_token){
                $this->session->set_userdata('email', $email);
                $this->changePassword();
            }
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Ganti Kata Sandi gagal, Token Salah!</div>');
                redirect('Auth_Masyarakat/lupa_password');
        }
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Ganti Kata Sandi gagal, Email belum terdaftar!</div>');
            redirect('Auth_Masyarakat/lupa_password');
    }

    private function _kirimEmail($token)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'amabellaamelina@gmail.com',
            'smtp_pass' => 'Princessasa12_',
            'smtp_crypto' => 'ssl',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8'
        ];


        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        
        $this->email->from('amabellaamelina@gmail.com', 'SIRUBAH');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Ganti Kata Sandi Akun');
        $this->email->message('Klik link disamping untuk mengganti kata sandi: <a href="'.base_url().'Auth_Masyarakat/reset_password/verifikasi?email='.$this->input->post('email'). '&token='.urlencode($token).'">Reset Kata Sandi</a>');

        if($this->email->send()){
            return true;
        }
            return false;
    }

    public function changePassword()
    {
        $this->form_validation->set_rules('password1','Kata sandi','required|trim|min_length[3]', ['min_length' => 'Kata Sandi terlalu pendek']);
        $this->form_validation->set_rules('password2','Konfirmasi kata sandi','required|matches[password1]', ['matches' => 'Kata sandi tidak sama' ]);
        
        if($this->form_validation->run() == false){
            $data['title'] = 'Ganti Kata Sandi';
            $this->load->view('Masyarakat/templates/header', $data);
            $this->load->view('Masyarakat/account/v_lupa_pass');
            $this->load->view('Masyarakat/templates/footer');
        } 
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('email');

            $this->db->set('password', $password);
            $this->db->where('email_msy', $email);
            $this->db->update('masyarakat');

            $this->session->unset_userdata('email');

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Kata Sandi berhasil diubah, silahkan masuk!</div>');
            redirect('Auth_Masyarakat/index');
    }
}
