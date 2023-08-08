<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function getAll()
    {
        $query = $this->db->get('user')->result_array();
        return $query;
    }
    public function addData($data){
		$res = $this->db->insert('user', $data);
		return $res;
	}
    public function getById($id){
		$query = $this->db->get_where('user', ['id_users' => $id])->row_array();
        return $query;
	}
    public function UpdateData($tableName,$data,$where){
		$res = $this->db->update($tableName,$data,$where);
		return $res;
	}
    public function HapusData($tableName, $where){
		$res = $this->db->delete($tableName,$where);
		return $res;
	}
}