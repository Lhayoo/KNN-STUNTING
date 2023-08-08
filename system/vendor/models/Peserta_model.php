<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_model extends CI_Model {
	
	public function get_peserta(){
		$this->db->select('*');
		$this->db->from('Tpeserta');

		$res = $this->db->get();
		return $res->result();
	}
	
}
