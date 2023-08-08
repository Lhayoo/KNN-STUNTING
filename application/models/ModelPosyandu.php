<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPosyandu extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    public function getData($tableName,$data,$where=""){
		$data = $this -> db ->query('SELECT '.$data.' FROM '.$tableName." ".$where);
		return $data -> result_array();
	}

    public function getPenimbanganLansia()
    {
        $this->db->select('penimbanganlansia.*, lansia.namaLansia, lansia.alamatLansia, lansia.tempatLahir, lansia.tanggalLahir, lansia.jk, lansia.umur as umurLansia' );
        $this->db->join('lansia', 'lansia.id = penimbanganlansia.idLansia');
        $query = $this->db->get('penimbanganlansia')->result_array();
        return $query;
    }
	public function getDetailPenimbanganLansia($id)
	{
		$this->db->select('penimbanganlansia.*, lansia.namaLansia, lansia.alamatLansia, lansia.tempatLahir, lansia.tanggalLahir, lansia.jk' );
        $this->db->join('lansia', 'lansia.idLansia = penimbanganlansia.idLansia');
		$this->db->where('penimbanganlansia.idLansia', $id);

        $query = $this->db->get('penimbanganlansia')->result_array();
        return $query;
	}
	public function getStatusBumil($where)
	{
		$this->db->select('penimbanganbumil.*, bumil.namaBumil');
        $this->db->join('bumil', 'bumil.id = penimbanganbumil.id_bumil');
		$this->db->where('idpbumil', $where);

        $query = $this->db->get('penimbanganbumil')->result_array();
        return $query;
	}
	public function getStatusBalita($where)
	{
		$this->db->select('penimbangan.*, balita.namaBayi, balita.tempatLahir, balita.tanggalLahir, balita.jenisKelamin, balita.alamat, balita.namaIbu, balita.namaAyah');
        $this->db->join('balita', 'balita.id = penimbangan.idBalita');
		$this->db->where('penimbangan.idBalita', $where);

        $query = $this->db->get('penimbangan')->result_array();
        return $query;
	}
    public function getPenimbanganBumil()
    {
        $this->db->select('penimbanganbumil.*, bumil.namaBumil');
        $this->db->join('bumil', 'bumil.id = penimbanganbumil.id_bumil');

        $query = $this->db->get('penimbanganbumil')->result_array();
        return $query;
    }
    public function getPenimbanganDetailBumil($id)
    {
        $this->db->select('penimbanganbumil.*, bumil.namaBumil');
        $this->db->join('bumil', 'bumil.id = penimbanganbumil.id_bumil');
		$this->db->where('penimbanganbumil.id_bumil', $id);

        $query = $this->db->get('penimbanganbumil')->result_array();
        return $query;
    }

    public function getPenimbanganDetailBalita($id)
    {
        $this->db->select('penimbangan.*, balita.namaBayi');
        $this->db->join('balita', 'balita.id = penimbangan.idBalita');
		$this->db->where('penimbangan.idBalita', $id);

        $query = $this->db->get('penimbangan')->result_array();
        return $query;
    }

    public function getPenimbanganDetailLansia($id)
    {
        $this->db->select('penimbanganlansia.*, lansia.namaLansia');
        $this->db->join('lansia', 'lansia.id = penimbanganlansia.idLansia');
		$this->db->where('penimbanganlansia.idLansia', $id);

        $query = $this->db->get('penimbanganlansia')->result_array();
        return $query;
    }
    public function getPenimbanganBalita()
    {
        $this->db->select('penimbangan.*, balita.namaBayi, balita.tempatLahir,balita.tanggalLahir, balita.jenisKelamin, balita.namaIbu, balita.namaAyah');
        $this->db->join('balita', 'balita.id = penimbangan.idBalita');

        $query = $this->db->get('penimbangan')->result_array();
        return $query;
    }

	public function cekId($tableName,$where=""){
		$data = $this -> db ->query('SELECT * FROM '.$tableName." ".$where);
  		return $data->num_rows();
 
	}
	public function dataTerakhir(){
		$data = $this->db->query("SELECT MAX(RIGHT(idBalita,3)) AS id FROM balita");
		return $data;
	}
    public function addData($tableName,$data){
		$res = $this -> db -> insert($tableName,$data);
		return $res;
	}
	public function HapusData($tableName, $where){
		$res = $this->db->delete($tableName,$where);
		return $res;
	}

    // PenimbanganBalita
    public function getBayi($id)
	{
		return $this->db->get_where('balita', array('idBalita' => $id))->row();
	}
	public function showPenimbangan($id) {
		return $this->db->get_where('penimbangan', array('idBalita' => $id));
	}

	public function insertPenimbangan($data) {
		return $this->db->insert('penimbangan', $data);
	}

	public function updatePenimbangan($data) {
		return $this->db->update('penimbangan', $data);
	}

	public function LaporanBulanan($data) {
		return $this->db->get_where('penimbangan', array('tgl_skrng' => $data));
	}

	// PenimbanganBumil
    public function getBumil($id)
	{
		return $this->db->get_where('bumil', array('id' => $id))->row_array();
	}

    public function getBalita($id)
	{
		return $this->db->get_where('balita', array('id' => $id))->row_array();
	}
    public function getDetailBalita($id)
	{
		$this->db->select('penimbangan.*, balita.namaBayi, balita.tempatLahir,balita.tanggalLahir, balita.jenisKelamin, balita.namaIbu, balita.namaAyah');
        $this->db->join('balita', 'balita.id = penimbangan.idBalita');
		$this->db->where('penimbangan.idpBalita', $id);

        $query = $this->db->get('penimbangan')->row_array();
        return $query;
	}
    public function getDetailLansia($id)
	{
		$this->db->select('penimbanganlansia.*, lansia.namaLansia, lansia.alamatLansia,lansia.tanggalLahir, lansia.jk, lansia.tempatLahir');
        $this->db->join('lansia', 'lansia.id = penimbanganlansia.idLansia');
		$this->db->where('penimbanganlansia.idplansia', $id);

        $query = $this->db->get('penimbanganlansia')->row_array();
        return $query;
	}
    public function getLansia($id)
	{
		return $this->db->get_where('lansia', array('id' => $id))->row_array();
	}

	public function showPenimbanganBumil($id) {
		return $this->db->get_where('penimbanganBumil', array('idBumil' => $id));
	}

	public function insertPenimbanganBumil($data) {
		return $this->db->insert('penimbanganBumil', $data);
	}

	public function updatePenimbanganBumil($data) {
		return $this->db->update('penimbanganBumil', $data);
	}

	public function UpdateData($tableName,$data,$where){
		$res = $this->db->update($tableName,$data,$where);
		return $res;
	}

	public function LaporanBulananBumil($data) {
		return $this->db->get_where('penimbangan', array('tgl_skrng' => $data));
	}
	public function grafik_bumil($id)
	{
		$data = $this->db->query("SELECT penimbanganbumil.id_bumil, penimbanganbumil.tgl_sekarang as tgl_penimbangan, penimbanganbumil.beratUpdate as beratUpdate, penimbanganbumil.tinggiIbu as tinggi from penimbanganbumil	
		join bumil on bumil.id=penimbanganbumil.id_bumil where penimbanganbumil.id_bumil=".$id);

		return $data->result();
	}

	public function grafik_lansia($id)
	{
		$data = $this->db->query("SELECT penimbanganlansia.idLansia, penimbanganlansia.tgl_sekarang as tgl_penimbangan, penimbanganlansia.beratUpdate as beratUpdate, penimbanganlansia.tinggiLansia as tinggi from penimbanganlansia	join lansia on lansia.id=penimbanganlansia.idLansia where penimbanganlansia.idLansia=".$id);
		return $data->result();
	}
	public function grafik_balita($id)
	{
		$data = $this->db->query("SELECT penimbangan.idBalita, penimbangan.tgl_skrng as tgl_penimbangan, penimbangan.beratLahir as beratUpdate, penimbangan.panjangLahir as tinggi from penimbangan	join balita on balita.id=penimbangan.idBalita where penimbangan.idBalita=".$id);

		return $data->result();
	}

	public function searchDataBumil($umur, $status)
    {
		$this->db->select('penimbanganbumil.*, bumil.namaBumil, bumil.umur, bumil.goldar');
        $this->db->join('bumil', 'bumil.id = penimbanganbumil.id_bumil');
		$this->db->where('bumil.umur', $umur);
		$this->db->or_where('penimbanganbumil.status', $status);

        $query = $this->db->get('penimbanganbumil')->result_array();
        return $query;
    }
	public function searchDataBumil2()
    {
		$umur = $this->input->post('umur', true);
		$status = $this->input->post('status', true);

		$this->db->select('penimbanganbumil.*, bumil.namaBumil, bumil.umur, bumil.goldar');
        $this->db->join('bumil', 'bumil.id = penimbanganbumil.id_bumil');
		$this->db->where('bumil.umur', $umur);
		$this->db->or_where('penimbanganbumil.status', $status);

        $query = $this->db->get('penimbanganbumil')->result_array();
        return $query;
    }
	public function searchDataBalita($umur, $status, $jk)
    {
		$this->db->select('penimbangan.*, balita.namaBayi, balita.jenisKelamin, balita.umur');
        $this->db->join('balita', 'balita.id = penimbangan.idBalita');
		$this->db->where('balita.umur', $umur);
		$this->db->or_where('penimbangan.status', $status);
		$this->db->or_where('balita.jenisKelamin', $jk);

        $query = $this->db->get('penimbangan')->result_array();
        return $query;
    }
	public function searchDataBalita2()
    {
		$umur = $this->input->post('umur', true);
		$status = $this->input->post('status', true);
		$jk = $this->input->post('jk', true);

		$this->db->select('penimbangan.*, balita.namaBayi, balita.jenisKelamin, balita.umur, balita.tanggalLahir');
        $this->db->join('balita', 'balita.id = penimbangan.idBalita');
		$this->db->where('balita.umur', $umur);
		$this->db->or_where('penimbangan.status', $status);
		$this->db->or_where('balita.jenisKelamin', $jk);

        $query = $this->db->get('penimbangan')->result_array();
        return $query;
    }
	public function searchDataLansia($umur, $status, $jk)
    {
		$this->db->select('penimbanganlansia.*, lansia.namaLansia, lansia.jk, lansia.umur as umurLansia');
        $this->db->join('lansia', 'lansia.id = penimbanganlansia.idLansia');
		$this->db->where('lansia.umur', $umur);
		$this->db->or_where('penimbanganlansia.status', $status);
		$this->db->or_where('lansia.jk', $jk);

        $query = $this->db->get('penimbanganlansia')->result_array();
        return $query;
    }
	public function searchDataLansia2()
    {
		$umur = $this->input->post('umur', true);
		$status = $this->input->post('status', true);
		$jk = $this->input->post('jk', true);

		$this->db->select('penimbanganlansia.*, lansia.namaLansia, lansia.jk, lansia.umur as umurLansia');
        $this->db->join('lansia', 'lansia.id = penimbanganlansia.idLansia');
		$this->db->where('lansia.umur', $umur);
		$this->db->where('penimbanganlansia.status', $status);
		$this->db->where('lansia.jk', $jk);

        $query = $this->db->get('penimbanganlansia')->result_array();
        return $query;
    }
	

	
}
