<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	function daftarPengguna(){
		return $this->db->get('user')->result();
	}
	
	public function insert(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$level = $this->input->post('level');
	
	$data = array(
					'username'=>$username,
					'password'=>$password,
					'nama'=>$nama,
					'email'=>$email,
					'level'=>$level,
			);
	$this->db->insert('user', $data);
	
	}

	public function getById($id){
		return $query = $this->db->query("SELECT * FROM user WHERE id='$id' ")->row_array();

	}

	public function edit(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$level = $this->input->post('level');

		$data = array(
					'username'=>$username,
					'password'=>$password,
					'nama'=>$nama,
					'email'=>$email,
					'level'=>$level,
		);
		$this->db->where('id',$id);
		$this->db->update('user', $data);
	}

	public function hapus($id){
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}
