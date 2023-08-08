<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pengguna_model'); //load model pengguna
	}
	
	public function index()
	{
		$data['content'] = 'admin/pengguna/list'; 
		$data['kelompok_data'] = $this->Pengguna_model->daftarPengguna();
		$this->load->view('templates/admin/index', $data);
	}

	public function create()
	{
		if (isset($_POST['submit'])){
			$this->Pengguna_model->insert();
			redirect('pengguna/index');
		}
		
		$data['content'] = 'admin/pengguna/create'; 
		$this->load->view('templates/admin/index', $data);


	}

	public function edit(){
		if (isset($_POST['submit'])){
			$this->Pengguna_model->edit();
			redirect('pengguna/index');
		}

		$id=$this->uri->segment(3);
		$data['pengguna'] = $this->Pengguna_model->getById($id);
		$data['content'] = 'admin/pengguna/edit'; 
		$this->load->view('templates/admin/index', $data);
	}

	public function hapus(){
		$id=$this->uri->segment(3);
		$this->Pengguna_model->hapus($id);
		redirect('pengguna/index');

	}

}
