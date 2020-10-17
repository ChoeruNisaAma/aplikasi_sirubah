 <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  class M_account extends CI_Model{
    
      public function daftar($data)
      {
        $this->db->insert('masyarakat',$data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun telah berhasil dibuat, silahkan Masuk untuk melanjutkan</div>');
        redirect('Auth_Masyarakat');
      }

      public function getKelurahan()
	    {
	      $this->db->select('*');
	      $this->db->from('nama_kelurahan');
	      $query = $this->db->get();

	      return $query->result_array();
	    }

      public function hapus_akun($where, $table)
      {
        $this->db->where($where);
        $this->db->delete($table);
      }

  }