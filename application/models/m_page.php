<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_page extends CI_Model {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

   public function isi_page()
    {
        $this->db->select('*');
        $this->db->from('konten_informasi');
        $query = $this->db->get();

        return $query->result_array();
    }
}