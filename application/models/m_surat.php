 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_surat extends CI_Model{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


  public function daftar_surat()
  {
    $this->db->select('*');
    $this->db->from('jenis_surat');
    $query = $this->db->get();

    return $query->result_array();   
  }

  public function lihat_syarat($id_syarat)
  { 
    $this->db->select('*');
    $this->db->from('jenis_surat');
    $this->db->where('id_surat', $id_syarat);
    $query = $this->db->get();

  	return $query->row_array();
	}

  public function surat_masuk($nik)
  {
    $this->db->select('*');
    $this->db->from('permohonan_surat');
    $this->db->join('jenis_surat', 'permohonan_surat.id_surat = jenis_surat.id_surat');
    $this->db->where('nik', $nik);
    $this->db->where('status', 'Menunggu');
    $this->db->or_where('status', 'Verifikasi RT');
    $this->db->or_where('status', 'Verifikasi RW');
    
    $query = $this->db->get();
    return $query->result_array();
  }
 
  public function surat_ditolak($nik)
  {
    $this->db->select('*');
    $this->db->from('permohonan_surat');
    $this->db->join('jenis_surat', 'permohonan_surat.id_surat = jenis_surat.id_surat');
    $this->db->where('nik', $nik);
    $this->db->where('status', 'Ditolak');

    $query = $this->db->get();
    return $query->result_array();
  }

  public function surat_selesai($nik)
  {
    $this->db->select('*');
    $this->db->from('permohonan_surat');
    $this->db->join('jenis_surat', 'permohonan_surat.id_surat = jenis_surat.id_surat');
    $this->db->where('nik', $nik);
    $this->db->where('status', 'Selesai');

    $query = $this->db->get();
    return $query->result_array();
  }


  public function hapus_surat($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function edit_surat($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->where($table, $data);
  }
} 