<?php

class M_kecamatan extends CI_Model{
	

	function __construct(){
		parent::__construct();
	}

	function tampil_kecamatan($num=null, $offset=null){
		
		$this->db->order_by('id_kecamatan','DESC');
		$query = $this->db->get('tb_kecamatan',$num, $offset);
		return $query;
	}


	function simpan_kecamatan($data){
		$this->db->insert('tb_kecamatan',$data);
	}


	function detail_kecamatan($id){
		$query = $this->db->get_where('tb_kecamatan',array('id_kecamatan'=>$id));

		return $query->row();
	}


	function ubah_kecamatan($data, $id){
		$this->db->where('id_kecamatan',$id);
		$this->db->update('tb_kecamatan',$data);
	}

	function hapus_kecamatan($id){
		$this->db->where('id_kecamatan',$id);
		$this->db->delete('tb_kecamatan');
	}
//end of class
}