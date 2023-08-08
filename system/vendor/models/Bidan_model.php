<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidan_model extends CI_Model {
	
	public function get_bidan(){
		$this->db->select('*');
		$this->db->from('Tbidan');

		$res = $this->db->get();
		return $res->result();
	}
	
}
