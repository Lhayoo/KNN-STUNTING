<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BayiModel extends CI_Model {

	public function showBayi()
	{
		return $this->db->get('balita')->result_object();
	}

	public function showBayi2($id)
	{
		return $this->db->get_where('balita', array('idBalita' => $id))->result_object();
	}

	public function insertBayi($data)
	{
		return $this->db->insert("balita", $data);
	}	

	public function getBayi($id)
	{
		return $this->db->get_where('balita', array('idBalita' => $id))->row();
	}

	public function updateBayi($data)
	{
		return $this->db->update('balita', $data);
	}

	public function deleteBayi($id)
	{
		return $this->db->delete('balita', array('idBalita' => $id));
	}

	public function countBayi()
	{
		return $this->db->count_all('balita');
	}

	// Penimbangan
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
		return $this->db->get_where('penimbangan', array('tanggal' => $data));
	}

	// Imunisasi
	public function showImunisasi($id) {
		return $this->db->get_where('tb_imunisasi', array('id_bayi' => $id));
	}

	public function insertImunisasi($data) {
		return $this->db->insert('tb_imunisasi', $data);
	}

	public function updateImunisasi($data) {
		return $this->db->update('tb_imunisasi', $data);
	}

    public function dataLog($id)
    {
        $sql = "SELECT * FROM login_attempts WHERE user_id = '$id'";
        return $this->db->query($sql)->num_rows();
    }
}

/* End of file m_model.php */
/* Location: ./application/models/m_model.php */