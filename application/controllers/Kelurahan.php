<?php

class Kelurahan extends CI_Controller{
	

	function __construct(){

		parent::__construct();
		// cek_login();
		$this->load->model(array('m_kelurahan'=>'kelurahan'));
		$this->load->model(array('m_kecamatan'=>'kecamatan'));
		$this->load->library('upload');
	}


	function index(){

		$data['kelurahan'] = $this->kelurahan->tampil_kelurahan();
		$data['title'] = 'Data Kelurahan | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		 if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelurahan/kelurahan_tampil', $data);
            $this->load->view('templates/footer-datatables');
       }
		// $this->load->view('admin/header',$data);
		// $this->load->view('kelurahan/kelurahan_tampil',$data);
		// $this->load->view('admin/footer');
	}


	function add(){
		$this->form_validation->set_rules('nama','Nama Kelurahan','required');
		$this->form_validation->set_rules('kecamatan','Nama Kecamatan','required');
		$data['title'] = 'Tambah Data Kelurahan | Sistem Informasi Stunting';
		$data['kecamatan'] = $this->kecamatan->tampil_kecamatan()->result();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('kelurahan/kelurahan_tambah', $data);
    
        $this->load->view('templates/footer-datatables');
		
	}

	public function processAdd(){
		$nama = $this->input->post('nama');
		$kecamatan = $this->input->post('kecamatan');
		$longitude = $this->input->post('lon');
		$latitude = $this->input->post('lat');

		$data = array(
			'nama_kelurahan'=>$nama,
			'id_kecamatan'=>$kecamatan,
			'longitude'=>$longitude,
			'latitude'=>$latitude
		);

		$this->kelurahan->simpan_kelurahan($data);

		$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
		redirect('kelurahan');
	}

	


	function ubah($id){

		$data['query'] = $this->kelurahan->detail_kelurahan($id);
		$data['kecamatan'] = $this->kecamatan->tampil_kecamatan()->result();
		$this->load->view('admin/header');
		$this->load->view('kelurahan/kelurahan_ubah',$data);
		$this->load->view('admin/footer');
	}


	function simpan_ubah($id){
		$nama = $this->input->post('nama');
		$kecamatan = $this->input->post('kecamatan');
		$longitude = $this->input->post('lon');
		$latitude = $this->input->post('lat');

		$data = array(
			'nama_kelurahan'=>$nama,
			'id_kecamatan'=>$kecamatan,
			'longitude'=>$longitude,
			'latitude'=>$latitude
		);


		$this->kelurahan->ubah_kelurahan($data, $id);

		//tampilkan pesan sukses
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Simpan Data Berhasil.</div>');

		//arahkan kembali ke halaman kelurahan atau controller kelurahan
		redirect('kelurahan');

	}


	function hapus($id){
		$this->kelurahan->hapus_kelurahan($id);
		//tampilkan pesan sukses
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Hapus Data Berhasil.</div>');

		//arahkan kembali ke halaman kelurahan atau controller kelurahan
		redirect('kelurahan');
	}

	function detail($id){
		$data['query'] = $this->kelurahan->detail_kelurahan($id);

		$this->load->view('admin/header');
		$this->load->view('kelurahan/kelurahan_detail',$data);
		$this->load->view('admin/footer');
	}

	function showkelurahan(){
		$kecamatan = $this->input->post('kecamatan');

		$query = $this->kelurahan->cari_kelurahan($kecamatan);

		
		if(!empty($query)){
			echo '<select name="kelurahan" id="kelurahan" class="form-control input-sm">';
			echo '<option value="">--Pilih--</option>';
			foreach($query as $row):
				echo '<option value="'.$row->id_kelurahan.'">'.$row->nama_kelurahan.'</option>';
			endforeach;	
			echo '</option>';
		}else{
			echo 'Kelurahan tidak ditemukan';
		}



	}

//end of class
}