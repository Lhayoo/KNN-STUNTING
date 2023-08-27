<?php

class M_dashboard extends CI_Model{
	

	function __construct(){
		parent::__construct();
	}

	public function narkoba_kecamatan()
	{
		$thn = date('Y');
		$this->db->select(array(
			'tb_kecamatan.id_kecamatan',
			'tb_kecamatan.nama_kecamatan',
			'tb_jenis_narkoba.jenis_narkoba',
			'COUNT(tb_narkoba.id_narkoba) AS jml'
		));

		$this->db->join('tb_kecamatan', 'tb_narkoba.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->join('tb_jenis_narkoba', 'tb_narkoba.id_jenis_narkoba = tb_jenis_narkoba.id_jenis_narkoba');
		
		

		$this->db->group_by('tb_kecamatan.id_kecamatan');
		//$this->db->order_by('tb_kecamatan.nama_kecamatan','ASC');
		$query = $this->db->get('tb_narkoba');

		return $query->result();
	}

	public function narkoba_kelurahan()
	{
		$thn = date('Y');
		$this->db->select(array(
			'tb_kecamatan.id_kecamatan',
			'tb_kecamatan.nama_kecamatan',
			'tb_jenis_narkoba.jenis_narkoba',
			'COUNT(tb_narkoba.id_narkoba) AS jml'
		));

		$this->db->join('tb_kecamatan', 'tb_narkoba.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->join('tb_jenis_narkoba', 'tb_narkoba.id_jenis_narkoba = tb_jenis_narkoba.id_jenis_narkoba');
		
		;

		$this->db->group_by('tb_narkoba.id_jenis_narkoba');
		//$this->db->order_by('tb_kecamatan.nama_kecamatan','ASC');
		$query = $this->db->get('tb_narkoba');

		return $query->result();
	}

//end of class
}