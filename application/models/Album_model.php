<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function all($id = false)
	{
    if ($id == false) {
      
		$query = "SELECT * FROM tbl_album ORDER BY album_id DESC";
		return $query = $this->db->query($query);
    }
      $query = "SELECT * FROM tbl_album WHERE album_id = '$id'";
      return $query = $this->db->query($query);
    
	}

	public function simpan($data){
    $this->db->insert('tbl_album',$data);
  }

  function update($data,$id){
    $this->db->where('album_id',$id);
    $this->db->update('tbl_album',$data);
  }

  function delete($id){
    $this->db->where('album_id',$id);
    $this->db->delete('tbl_album');
  }

}