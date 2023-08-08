<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidan extends CI_Controller {

	public function list()
	{
		$data['page'] = "bidan/list";
		$this->load->model('Bidan_model');
		$data["bidan"] = $this->Bidan_model->get_bidan();
		$this->load->view('main', $data);
	}	

	public function form(){
		$data['page'] = "bidan/form";
		$this->load->view('main', $data);
	}
	
}