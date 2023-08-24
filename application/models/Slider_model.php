<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

	public function all()
	{
		$query = "SELECT * FROM tbl_slider ORDER BY slide_id DESC";
		return $query = $this->db->query($query);
	}

    public function get_slider_by_id($id){
        $query = "SELECT * FROM tbl_slider WHERE slide_id = '$id'";
        return $query = $this->db->query($query);
    }

	public function simpan($gambar){
        $data=array(
                    'slide_title'   =>  $this->input->post('title'),
                    'slide_desc'    =>  $this->input->post('desc'),
                    'slide_image'   =>   $gambar,
                    'status'      	=>  $this->input->post('status')
 				);
        $this->db->insert('tbl_slider',$data);
    }

    function update($gambar){
        if($gambar==null){
                    $data=array(
                    'slide_title'   =>  $this->input->post('title'),
                    'slide_desc'    =>  $this->input->post('desc'),
                    'status'      	=>  $this->input->post('status')
 				);
        }else{
                   $data=array(
                    'slide_title'   =>  $this->input->post('title'),
                    'slide_desc'    =>  $this->input->post('desc'),
                    'slide_image'   =>   $gambar,
                    'status'      	=>  $this->input->post('status')
 				);
        }
        $this->db->where('slide_id',$this->input->post('id'));
        $this->db->update('tbl_slider',$data);
    }

}