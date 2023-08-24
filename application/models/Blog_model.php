<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function all($id = false)
	{
		if ($id == false ){
			
		$query = "SELECT * FROM tbl_post JOIN user ON user.id_users = tbl_post.post_by WHERE post_type='post' ORDER BY post_id DESC";
		return $query = $this->db->query($query);
	}
	$query = "SELECT * FROM tbl_post JOIN user ON user.id_users = tbl_post.post_by WHERE post_type='post' AND post_id = '$id'";
		return $query = $this->db->query($query);
	}



	public function all_video()
	{
		$query = "SELECT * FROM tbl_post JOIN user ON user.id_users = tbl_post.post_by WHERE post_type='video' ORDER BY post_id DESC";
		return $query = $this->db->query($query);
	}

	public function simpan($data){
    $this->db->insert('tbl_post',$data);
  }

  function update($data,$id){
    $this->db->where('post_id',$id);
    $this->db->update('tbl_post',$data);
  }
	
	public function view_count($id)
  {
    $this->db->set('post_views', 'post_views+1', false);
    $this->db->where('post_id', $id);
    $this->db->update('tbl_post');
  }
}

/* End of file slider_model.php */
/* Location: ./application/models/slider_model.php */