<?php

class M_publik extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function ambil_data($kecamatan,$kelurahan,$periode,$status){
		$this->db->select('balita.*,tb_kelurahan.nama_kelurahan,tb_kecamatan.nama_kecamatan,tb_kelurahan.id_kecamatan,tb_kelurahan.longitude,tb_kelurahan.latitude');
		$this->db->join('tb_kelurahan','tb_kelurahan.id_kelurahan = balita.kel_id');
		$this->db->join('tb_kecamatan','tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan');

		if($kecamatan <> ""){
			$this->db->where('tb_kelurahan.id_kecamatan',$kecamatan);
		}

		if($kelurahan <> ""){
			$this->db->where('tb_kelurahan.id_kelurahan',$kelurahan);
		}


		if($status <> ""){
			$this->db->where('balita.status',$status);
		}

		if($periode <> "0"){
			$this->db->where('YEAR(balita.tgl_periksa)',$periode);
		}

	$query = $this->db->get('balita');

		return $query;
	}
	function ambil_data_group($kecamatan,$kelurahan,$periode,$status){
		$this->db->select('balita.*,tb_kelurahan.nama_kelurahan,tb_kecamatan.nama_kecamatan,tb_kelurahan.id_kecamatan,tb_kelurahan.longitude,tb_kelurahan.latitude');
		$this->db->join('tb_kelurahan','tb_kelurahan.id_kelurahan = balita.kel_id');
		$this->db->join('tb_kecamatan','tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan');

		if($kecamatan <> ""){
			$this->db->where('tb_kelurahan.id_kecamatan',$kecamatan);
		}

		if($kelurahan <> ""){
			$this->db->where('tb_kelurahan.id_kelurahan',$kelurahan);
		}


		if($status <> ""){
			$this->db->where('balita.status',$status);
		}

		if($periode <> "0"){
			$this->db->where('YEAR(balita.tgl_periksa)',$periode);
		}
		$this->db->group_by('balita.kel_id');
	$query = $this->db->get('balita');
		return $query;
	}

	function ambil_narkoba_wilayah($kecamatan,$kelurahan, $jenisnarkoba, $periode){

		$this->db->select('*');
		$this->db->join('tb_kelurahan','tb_kelurahan.id_kelurahan = tb_narkoba.id_kelurahan');
		$this->db->join('tb_kecamatan','tb_kecamatan.id_kecamatan = tb_narkoba.id_kecamatan');
		$this->db->join('tb_jenis_narkoba','tb_jenis_narkoba.id_jenis_narkoba = tb_narkoba.id_jenis_narkoba');

		if($kecamatan <> ""){
			$this->db->where('tb_kelurahan.id_kecamatan',$kecamatan);
		}

		if($kelurahan <> ""){
			$this->db->where('tb_kelurahan.id_kelurahan',$kelurahan);
		}


		if($jenisnarkoba <> ""){
			$this->db->where('tb_narkoba.id_jenis_narkoba',$jenisnarkoba);
		}

		if($periode <> "0"){
			$this->db->where('tb_narkoba.tahun_narkoba',$periode);
		}

		$query = $this->db->get('tb_narkoba');

		return $query;
	}

	function ambil_jumlah_narkoba_wilayah($kecamatan,$kelurahan, $jenisnarkoba, $periode){

		$this->db->select('*');
		$this->db->join('tb_kelurahan','tb_kelurahan.id_kelurahan = tb_narkoba.id_kelurahan');
		$this->db->join('tb_kecamatan','tb_kecamatan.id_kecamatan = tb_narkoba.id_kecamatan');
		$this->db->join('tb_jenis_narkoba','tb_jenis_narkoba.id_jenis_narkoba = tb_narkoba.id_jenis_narkoba');

		if($kecamatan <> ""){
			$this->db->where('tb_kelurahan.id_kecamatan',$kecamatan);
		}

		if($kelurahan <> ""){
			$this->db->where('tb_kelurahan.id_kelurahan',$kelurahan);
		}


		if($jenisnarkoba <> ""){
			$this->db->where('tb_narkoba.id_jenis_narkoba',$jenisnarkoba);
		}

		if($periode <> "0"){
			$this->db->where('tb_narkoba.tahun_narkoba',$periode);
		}

		$query = $this->db->get('tb_narkoba');

		return $query;
	}

	function tampil_data($id){
		$this->db->select('balita.*,tb_kelurahan.nama_kelurahan,tb_kecamatan.nama_kecamatan,tb_kelurahan.longitude,tb_kelurahan.latitude');
		$this->db->join('tb_kelurahan','tb_kelurahan.id_kelurahan = balita.kel_id');
		$this->db->join('tb_kecamatan','tb_kecamatan.id_kecamatan = tb_kelurahan.id_kecamatan');
		
		$this->db->where('id',$id);
		$query = $this->db->get('balita');
		return $query->row_array();
	}

//end of class
}