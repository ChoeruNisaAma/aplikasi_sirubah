<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    //fungsi halaman login
    public function index()
    {
        $data['title'] = 'Halaman Masuk';

        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Administrator/templates/auth_header', $data);
            $this->load->view('Administrator/auth/v_login');
            $this->load->view('Administrator/templates/auth_footer');
        } 
        
        $this->auth();
    }

    //fungsi login
    private function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $admin = $this->db->get_where('administrator', ['username' => $username])->row_array();

        if($admin){
            if(password_verify($password, $admin['password'])){
                $info = ['username' => $admin['username']];
                $this->session->set_userdata($info);
                redirect('Konten');

            } 
           
           $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password salah</div>');
           redirect('Auth_admin');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum terdaftar</div>');
        redirect('Auth_admin');
    }

    //fungsi logout
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah keluar</div>');
        redirect('Auth_admin');
    }

    //fungsi halaman password
    public function lupa_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false){
            $data['title'] = 'Reset Kata Sandi';
            $this->load->view('Administrator/templates/auth_header', $data);
            $this->load->view('Administrator/auth/v_kirim_email');
            $this->load->view('Administrator/templates/auth_footer');
        } 

        $email = $this->input->post('email');
        $user = $this->db->get_where('administrator', ['email' => $email]) -> row_array();

        if($user){
            $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => tanggal()
                ];
            $this->db->insert('user_token', $user_token);
            $this->_kirimEmail($token);

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Silahkan cek email Anda untuk ganti kata sandi!</div>');
            redirect('Auth_admin');
        }
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum terdaftar</div>');
        redirect('Auth_admin');

    }


    //fungsi reset password
    public function reset_password(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('administrator', ['email => $email'])->row_array();

        if($user){
            $user_token = $this->db->get_where('user_token', ['token'=> $token])->row_array();
            if($user_token){
                $this->session->set_userdata('email', $email);
                $this->changePassword();
            }
            
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Ganti Kata Sandi gagal, Token Salah!</div>');
            redirect('Auth_admin/lupa_password');
        }
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Ganti Kata Sandi gagal, Email belum terdaftar!</div>');
        redirect('Auth_admin/lupa_password');
    }

    //fungsi kirim email
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
        $this->email->message('Klik link disamping untuk mengganti kata sandi: <a href="'.base_url().'Auth_admin/reset_password/verifikasi?email='.$this->input->post('email'). '&token='.urlencode($token).'">Reset Kata Sandi</a>');

        if($this->email->send()){
            return true;
        }
        
        echo $this->email->print_debugger();
        die;
    }


    //fungsi ganti password
    public function changePassword()
    {
        $this->form_validation->set_rules('password1','Kata sandi','required|trim|min_length[3]', ['min_length' => 'Kata Sandi terlalu pendek']);
        $this->form_validation->set_rules('password2','Konfirmasi kata sandi','required|matches[password1]', ['matches' => 'Kata sandi tidak sama' ]);
        
        if($this->form_validation->run() == false){
            $data['title'] = 'Ganti Kata Sandi';
            $this->load->view('Administrator/templates/auth_header', $data);
            $this->load->view('Administrator/auth/v_reset_password');
            $this->load->view('Administrator/templates/auth_footer');
        }

        $password1 = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $email = $this->session->userdata('email');

        $this->db->set('password', $password1);
        $this->db->where('email', $email);
        $this->db->update('administrator');

        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Kata Sandi berhasil diubah, silahkan masuk!</div>');
        redirect('Auth_admin/index');
    }
}

