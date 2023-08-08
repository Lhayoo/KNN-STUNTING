<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function list()
	{
		$data['page'] = "peserta/list";
		$this->load->model('Peserta_model');
		$data["p"] = $this->Peserta_model->get_peserta();
		$this->load->view('main', $data);
	}

	public function form(){
		$data['page'] = "peserta/form";
		$this->load->view('main', $data);
	}
	
}