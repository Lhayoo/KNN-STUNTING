<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekam extends CI_Controller {

	public function index()
	{
		$data['page'] = "rekam/list";
		$this->load->model('Rekam_model');
		$data["rekam"] = $this->Rekam_model->get_rekam();
		// $this->load->view('pelanggan/list_pelanggan',$data);
		$this->load->view('main',$data);
	}

	public function form(){
		$data['page'] = "rekam/form";
		$this->load->model('Rekam_model');
		$data["namapeserta"] = $this->Rekam_model->get_namapeserta();
		$data["namabidan"] = $this->Rekam_model->get_namabidan();
		$this->load->view('main', $data);
	}

	public function submit(){
		$this->load->model('Rekam_model');
		$rekambaru = array(
			// 'no_transaksi' => '',
			'kode_peserta' => $this->input->post('nama_peserta'),
			'tanggal' => $this->input->post('tanggal'),
			'kode_bidan' => $this->input->post('nama_bidan'),
			'keluhan' => $this->input->post('keluhan'),
			'biaya' => $this->input->post('biaya')
		);

		$this->Rekam_model->add($rekambaru);
	}

}
