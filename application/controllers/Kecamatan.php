<?php

class Kecamatan extends CI_Controller{
	

	function __construct(){

		parent::__construct();
		cek_login();
		$this->load->model(array('m_kecamatan'=>'kecamatan'));
		$this->load->library('upload');
	}


	function index(){

		$jml = $this->kecamatan->tampil_kecamatan();

		$config['base_url'] = site_url('kecamatan/index');
		$config['per_page'] = 20;
		$config['total_rows'] = $jml->num_rows();

		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();
		$data['query'] = $this->kecamatan->tampil_kecamatan($config['per_page'],$this->uri->segment(3))->result();
		
		$this->load->view('admin/header',$data);
		$this->load->view('kecamatan/kecamatan_tampil',$data);
		$this->load->view('admin/footer');
	}


	function tambah(){
		$this->form_validation->set_rules('nama','Nama Kecamatan','required');
		if($this->form_validation->run() == FALSE){
			
			$this->load->view('admin/header');
			$this->load->view('kecamatan/kecamatan_tambah');
			$this->load->view('admin/footer');
		}else{
			$nama = $this->input->post('nama');
			$longitude = $this->input->post('lon');
			$latitude = $this->input->post('lat');

			$data = array(
				'nama_kecamatan'=>$nama,
				'longitude'=>$longitude,
				'latitude'=>$latitude
			);

			$this->kecamatan->simpan_kecamatan($data);

			
			//tampilkan pesan sukses
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Simpan Data Berhasil.</div>');

			//arahkan kembali ke halaman kecamatan atau controller kecamatan
			redirect('kecamatan');


		}
	}


	


	function ubah($id){

		$data['query'] = $this->kecamatan->detail_kecamatan($id);
		$this->load->view('admin/header');
		$this->load->view('kecamatan/kecamatan_ubah',$data);
		$this->load->view('admin/footer');
	}


	function simpan_ubah($id){
		$nama = $this->input->post('nama');
			$longitude = $this->input->post('lon');
			$latitude = $this->input->post('lat');

			$data = array(
				'nama_kecamatan'=>$nama,
				'longitude'=>$longitude,
				'latitude'=>$latitude
			);


			$this->kecamatan->ubah_kecamatan($data, $id);

			//tampilkan pesan sukses
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Simpan Data Berhasil.</div>');

			//arahkan kembali ke halaman kecamatan atau controller kecamatan
			redirect('kecamatan');

	}


	function hapus($id){
		$this->kecamatan->hapus_kecamatan($id);
		//tampilkan pesan sukses
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Hapus Data Berhasil.</div>');

		//arahkan kembali ke halaman kecamatan atau controller kecamatan
		redirect('kecamatan');
	}


	function detail($id){
		$data['query'] = $this->kecamatan->detail_kecamatan($id);

		$this->load->view('admin/header');
		$this->load->view('kecamatan/kecamatan_detail',$data);
		$this->load->view('admin/footer');
	}
//end of class
}