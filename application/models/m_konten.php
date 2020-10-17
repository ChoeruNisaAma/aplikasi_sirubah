 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_konten extends CI_Model {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

   public function isi_konten()
    {
        $this->db->select('*');
        $this->db->from('konten_informasi');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function hapus_konten($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function lihat_konten($id_konten)
    {
        $this->db->select('*');
        $this->db->from('konten_informasi');
        $this->db->where('id_konten', $id_konten);
        $query = $this->db->get();

        return $query->row_array();
    }
}
