<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function all()
	{
		$query = "SELECT * FROM tbl_menu ORDER BY menu_id DESC";
		return $query = $this->db->query($query);
	}

    function select_parent(){
        return $this->db->get_where('tbl_menu',array('is_main_menu'=>0));
    }

	public function simpan(){
        $data=array(
                    'menu_title'    =>  $this->input->post('title'),
                    'menu_content'  =>  $this->input->post('content'),
                    'menu_seo'      =>  seo_title($this->input->post('title')),
                    'is_main_menu'  =>  $this->input->post('parent'),
                    'menu_link'     =>  site_url('p/'.seo_title($this->input->post('title')).'')
 				);
        $this->db->insert('tbl_menu',$data);
    }

    function update(){
        
        $data=array(
                    'menu_title'    =>  $this->input->post('title'),
                    'menu_content'  =>  $this->input->post('content'),
                    'menu_seo'      =>  seo_title($this->input->post('title')),
                    'is_main_menu'  =>  $this->input->post('parent'),
                    'menu_link'     =>  site_url('p/'.seo_title($this->input->post('title')).'')
		);
        $this->db->where('menu_id',$this->input->post('id'));
        $this->db->update('tbl_menu',$data);
    }

}

/* End of file menu_model.php */
/* Location: ./application/models/menu_model.php */