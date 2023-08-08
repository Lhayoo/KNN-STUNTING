<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli extends CI_Controller {

	public function list()
	{
		$data['page'] = "poli/list";
		$this->load->model('Poli_model');
		$data["p"] = $this->Poli_model->get_poli();
		$this->load->view('main', $data);
	}

	public function form(){
		$data['page'] = "poli/form";
		$this->load->view('main', $data);
	}
	
}