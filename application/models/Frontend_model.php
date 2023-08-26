<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model {

	public function newest()
	{
		$query = "SELECT post_title FROM tbl_post WHERE post_type = 'post' AND post_status = 1 ORDER BY post_id DESC LIMIT 5";
		return $query = $this->db->query($query);
	}

  public function kotas()
	{
		$query = "SELECT * FROM tbl_post as p JOIN user as u ON u.id_users = p.post_by  WHERE post_type = 'post' AND post_status = 1 AND post_category = 'kota' ORDER BY post_id DESC LIMIT 1";
		return $query = $this->db->query($query);
	}

  public function kota()
	{
		$query = "SELECT * FROM tbl_post as p JOIN user as u ON u.id_users = p.post_by WHERE post_type = 'post' AND post_status = 1 AND post_category = 'kota' ORDER BY RAND() LIMIT 3";
		return $query = $this->db->query($query);
	}

  public function lains()
  {
    $query = "SELECT * FROM tbl_post as p JOIN user as u ON u.id_users = p.post_by  WHERE post_type = 'post' AND post_status = 1 AND post_category = 'lainnya' ORDER BY post_id DESC LIMIT 1";
    return $query = $this->db->query($query);
  }

  public function lain()
  {
    $query = "SELECT * FROM tbl_post as p JOIN user as u ON u.id_users = p.post_by WHERE post_type = 'post' AND post_status = 1 AND post_category = 'lainnya' ORDER BY RAND() LIMIT 3";
    return $query = $this->db->query($query);
  }

  public function brpopular()
  {
    $query = "SELECT * FROM tbl_post WHERE post_type = 'post' AND post_status = 1 ORDER BY post_views DESC LIMIT 5";
    return $query = $this->db->query($query);
  }

  public function album()
	{
		$query = "SELECT * FROM tbl_album WHERE album_status = 1 ORDER BY album_id DESC LIMIT 2";
		return $query = $this->db->query($query);
	}

  public function video()
	{
		$query = "SELECT * FROM tbl_post WHERE post_type = 'video' AND post_status = 1 ORDER BY post_id DESC LIMIT 2";
		return $query = $this->db->query($query);
	}

	public function k_berita($category){
	    $this->load->library('pagination');
	    
	    $query = "SELECT * FROM tbl_post as p JOIN user as u ON u.id_users = p.post_by  WHERE post_type = 'post' AND post_status = 1 AND post_category = '".$category."' ORDER BY post_id DESC";
	    
	    $config['base_url'] = base_url('index.php/berita/kategori/'.$category.' ');
	    $config['total_rows'] = $this->db->query($query)->num_rows();
	    $config['per_page'] = 2;
	    $config['uri_segment'] = 4;
	    $config['num_links'] = 3;
	    
	    // Bootstrap 4, work very fine.
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
	    // End style pagination
	    
	    $this->pagination->initialize($config);
	    
	    $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
	    $query .= " LIMIT ".$page.", ".$config['per_page'];
	    
	    $data['limit'] 		= $config['per_page'];
	    $data['total_rows'] = $config['total_rows'];
	    $data['pagination'] = $this->pagination->create_links();
	    $data['brta'] = $this->db->query($query)->result_array();
	    
	    return $data;
	  }

}

/* End of file slider_model.php */
/* Location: ./application/models/slider_model.php */