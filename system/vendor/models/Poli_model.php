<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli_model extends CI_Model {
	
	public function get_poli(){
		$this->db->select('*');
		$this->db->from('Tpoli');

		$res = $this->db->get();
		return $res->result();
	}
	
}
