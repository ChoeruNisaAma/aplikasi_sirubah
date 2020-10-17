<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
 
  class M_profil extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    } 

    public function getInfo($nik)
	  {
      $this->db->select('*');
      $this->db->from('masyarakat');
      $this->db->join('pengurus', 'masyarakat.kelurahan = pengurus.id');
      $this->db->where('masyarakat.nik', $nik);
      $query = $this->db->get();

	    return $query->row_array();
	  }

    public function getPassword($nik)
    {
      $this->db->select('*');
      $this->db->from('masyarakat');
      $this->db->where('nik', $nik);
      $query = $this->db->get();

      return $query->row_array();
    }

    public function getEmail($email)
    {
      $this->db->select('*');
      $this->db->from('masyarakat');
      $this->db->where('email', $email);
      $query = $this->db->get();

      return $query->row_array();
    }
  }  

 
 