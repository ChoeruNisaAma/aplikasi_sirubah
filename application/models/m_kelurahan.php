 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_kelurahan extends CI_Model {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function daftar_instansi()
    {
        $this->db->select('*');
        $this->db->from('pengurus');
        $where="jabatan='kel'";
        $this->db->where($where);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function hapus_data($where, $table)
    {
    	$this->db->where($where);
    	$this->db->delete($table);
    }
}

 