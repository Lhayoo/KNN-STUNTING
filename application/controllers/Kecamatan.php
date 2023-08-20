<?php

class Kecamatan extends CI_Controller{
	

	function __construct(){

		parent::__construct();
		// cek_login();
		$this->load->model(array('m_kecamatan'=>'kecamatan'));
		$this->load->library('upload');
	}


	function index(){

		$data['kecamatan'] = $this->kecamatan->tampil_kecamatan();
		$data['title'] = 'Data kecamatan | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		 if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kecamatan/kecamatan_tampil', $data);
            $this->load->view('templates/footer-datatables');
       }
	}


	function add(){
		$this->form_validation->set_rules('nama','Nama kecamatan','required');
		$this->form_validation->set_rules('kecamatan','Nama Kecamatan','required');
		$data['title'] = 'Tambah Data kecamatan | Sistem Informasi Stunting';
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('kecamatan/kecamatan_tambah', $data);
    
        $this->load->view('templates/footer-datatables');
		
	}

	public function processAdd(){
		$nama = $this->input->post('nama');
		$longitude = $this->input->post('lon');
		$latitude = $this->input->post('lat');

		$data = array(
			'nama_kecamatan'=>$nama,
			'longitude'=>$longitude,
			'latitude'=>$latitude
		);

		$this->kecamatan->simpan_kecamatan($data);

		// $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
		
        $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
		redirect('kecamatan');
	}

	
	public function delete($idkecamatan) {
		$res = $this->kecamatan->hapus_kecamatan($idkecamatan);
        $this->session->set_flashdata('success', 'Berhasil Dihapus');
		redirect('kecamatan');
	}


	function edit($id){
		$data['title'] = 'Edit Data kecamatan | Sistem Informasi Stunting';
		$data['query'] = $this->kecamatan->detail_kecamatan($id);
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('kecamatan/kecamatan_ubah', $data);
		
        $this->load->view('templates/footer-datatables');
	}


	function simpan_ubah(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$longitude = $this->input->post('lon');
		$latitude = $this->input->post('lat');

		$data = array(
			'nama_kecamatan'=>$nama,
			'longitude'=>$longitude,
			'latitude'=>$latitude
		);

		$this->kecamatan->ubah_kecamatan($data,$id);

		$this->session->set_flashdata('success', 'Data Berhasil Diubah');
		redirect('kecamatan');
	}

	function detail($id){
		$data['query'] = $this->kecamatan->detail_kecamatan($id);
		$data['title'] = 'Detail Data kecamatan | Sistem Informasi Stunting';
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('kecamatan/kecamatan_detail', $data);
		$this->load->view('templates/footer-datatables');
	}

	function showkecamatan(){
		$kecamatan = $this->input->post('kecamatan');

		$query = $this->kecamatan->cari_kecamatan($kecamatan);

		
		if(!empty($query)){
			echo '<select name="kecamatan" id="kecamatan" class="form-control input-sm">';
			echo '<option value="">--Pilih--</option>';
			foreach($query as $row):
				echo '<option value="'.$row->id_kecamatan.'">'.$row->nama_kecamatan.'</option>';
			endforeach;	
			echo '</option>';
		}else{
			echo 'kecamatan tidak ditemukan';
		}



	}

//end of class
}