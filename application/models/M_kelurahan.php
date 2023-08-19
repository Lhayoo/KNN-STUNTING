<?php

class M_kelurahan extends CI_Model{
	

	function __construct(){
		parent::__construct();
	}

	function tampil_kelurahan(){
		$this->db->select(array(
			'tb_kecamatan.nama_kecamatan',
			'tb_kelurahan.*'));
		$this->db->join('tb_kecamatan','tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan');
		$this->db->order_by('id_kecamatan','ASC');
		$this->db->order_by('nama_kelurahan','ASC');
		$query = $this->db->get('tb_kelurahan')->result_array();

		return $query;
		// $query = $this->db->get('tb_kelurahan',$num, $offset);
			
		// return $query;
	}


	function simpan_kelurahan($data){
		$this->db->insert('tb_kelurahan',$data);
	}


	function detail_kelurahan($id){
		$this->db->select(array(
			'tb_kecamatan.nama_kecamatan',
			'tb_kelurahan.*'));
		$this->db->join('tb_kecamatan','tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan');
		$query = $this->db->get_where('tb_kelurahan',array('id_kelurahan'=>$id));

		return $query->row();
	}


	function ubah_kelurahan($data, $id){
		$this->db->where('id_kelurahan',$id);
		$this->db->update('tb_kelurahan',$data);
	}

	function hapus_kelurahan($id){
		$this->db->where('id_kelurahan',$id);
		$this->db->delete('tb_kelurahan');
	}

	function cari_kelurahan($kecamatan){
		$query = $this->db->get_where('tb_kelurahan',array('id_kecamatan'=>$kecamatan));

		return $query->result();
	}
//end of class
}