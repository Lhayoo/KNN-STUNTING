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

		// $this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
		
        $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
		redirect('kelurahan');
	}

	
	public function delete($idKelurahan) {
		$res = $this->kelurahan->hapus_kelurahan($idKelurahan);
        $this->session->set_flashdata('success', 'Berhasil Dihapus');
		redirect('kelurahan');
	}


	function edit($id){
		$data['title'] = 'Edit Data Kelurahan | Sistem Informasi Stunting';
		$data['query'] = $this->kelurahan->detail_kelurahan($id);
		$data['kecamatan'] = $this->kecamatan->tampil_kecamatan()->result();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('kelurahan/kelurahan_ubah', $data);
		
        $this->load->view('templates/footer-datatables');
	}


	function simpan_ubah(){
		$id = $this->input->post('id');
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

		$this->kelurahan->ubah_kelurahan($data,$id);

		$this->session->set_flashdata('success', 'Data Berhasil Diubah');
		redirect('kelurahan');
	}

	function detail($id){
		$data['query'] = $this->kelurahan->detail_kelurahan($id);
		$data['title'] = 'Detail Data Kelurahan | Sistem Informasi Stunting';
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('kelurahan/kelurahan_detail', $data);
		$this->load->view('templates/footer-datatables');
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