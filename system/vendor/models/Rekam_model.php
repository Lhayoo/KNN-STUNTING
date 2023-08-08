<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekam_model extends CI_Model {
	public $tablerekam = "Trekam";
	public function get_rekam(){

		$this->db->select('Trekam.no_transaksi, Trekam.kode_peserta, Tpeserta.nama_peserta, Tpeserta.umur, Tpeserta.jenis_kelamin, Trekam.keluhan, Tpoli.nama_poli, Tbidan.nama_bidan, Trekam.biaya');
		$this->db->from('Trekam');
		$this->db->join('Tbidan','Tbidan.kode_bidan = Trekam.kode_bidan');
		$this->db->join('Tpeserta','Tpeserta.kode_peserta = Trekam.kode_peserta');
		$this->db->join('Tpoli','Tpoli.kode_poli = Tbidan.kode_poli');

		$res = $this->db->get();
		return $res->result();
	}

	public function get_namapeserta(){
		$this->db->select('*');
		$this->db->from('Tpeserta');

		$res = $this->db->get();
		return $res->result();
	}

	public function get_namabidan(){
		$this->db->select('*');
		$this->db->from('Tbidan');

		$res = $this->db->get();
		return $res->result();
	}

	public function add($rekambaru){
		
		$this->db->insert($this->tablerekam,$rekambaru);

		if ($this->db->affected_rows()>0) {
			redirect('Rekam');
		}else{
			echo "gagal";
		}
	}
	
}
