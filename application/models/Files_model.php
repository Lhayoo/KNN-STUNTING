<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files_model extends CI_Model {

	public function all($id = false)
	{
		if($id == false){
			$query = "SELECT * FROM tbl_files JOIN user ON user.id_users = tbl_files.file_by ORDER BY file_id DESC";
			return $query = $this->db->query($query);
		}else{
			$query = "SELECT * FROM tbl_files JOIN user ON user.id_users = tbl_files.file_by WHERE file_id = $id";
			return $query = $this->db->query($query);
		}
		
	}

	public function allfront()
	{
		$query = "SELECT * FROM tbl_files JOIN user ON user.id_users = tbl_files.file_by WHERE file_visibility = 1 ORDER BY file_id DESC";
		return $query = $this->db->query($query);
	}

	public function simpan($data){
    $this->db->insert('tbl_files',$data);
  }

  function update($data,$id){
    $this->db->where('file_id',$id);
    $this->db->update('tbl_files',$data);
  }

  function hapus($id){
	$this->db->where('file_id',$id);
	$this->db->delete('tbl_files');
  }

	public function download_count($id)
  {
    $this->db->set("file_counter", "file_counter+1", false);
    $this->db->where('file_id', $id);
    $this->db->update('tbl_files');
  }

	public function find($id)
	{
		$this->db->where("file_id", $id);
		$query = $this->db->get('tbl_files');
		return $query->num_rows() ? $query->row() : null;

	}
}