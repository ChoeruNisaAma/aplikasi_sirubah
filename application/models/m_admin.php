<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  class M_admin extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    } 

    public function getdata($username)
	  {
      $this->db->select('*');
      $this->db->from('administrator');
      $this->db->where('username', $username);
      $query = $this->db->get();

	    return $query->row_array();
	  }

    public function getadmin()
    {
      $this->db->select('*');
      $this->db->from('administrator');
      $query = $this->db->get();

      return $query->result_array();
    }
    
    public function daftar_akun()
    {
        return $this->db->query("SELECT * FROM administrator")->result_array();
    }

    public function hapus_admin($where, $table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }
  }