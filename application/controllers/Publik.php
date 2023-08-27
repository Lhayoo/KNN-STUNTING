<?php

class Publik extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array(
			'BayiModel' => 'bayi',
			'm_kecamatan'=>'kecamatan',
			'm_kelurahan'=>'kelurahan',
			'm_publik'=>'publik',
			'm_dashboard'=>'dashboard'));

	}


	function index(){
		$data['title'] = 'STUNTING | STUNTING KOTA PEKALONGAN';
		
		$data['kecamatan'] = $this->kecamatan->tampil_kecamatan();
			
		$this->load->view('frontend/header',$data);
		$this->load->view('publik/main',$data);
	
		$this->load->view('frontend/footer',$data);
			// $data['content'] = 'frontend/home';
			// $this->load->view('frontend/template',$data);
	}

	function cari_wilayah(){
		$status = $this->input->post('status');
		$kecamatan= $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$periode = $this->input->post('periode');
			$data['status'] = $status;
			$data['kecamatan'] = $kecamatan;
			$data['kelurahan'] = $kelurahan;
			$data['periode'] = $periode;

			$data['kecamatan'] = $this->kecamatan->tampil_kecamatan();

			$data['fetchAll'] = $this->publik->ambil_data($kecamatan,$kelurahan,$periode,$status)->result();
			$data['jumlah'] = $this->publik->ambil_data($kecamatan,$kelurahan,$periode,$status)->num_rows();

			// var_dump($data['fetchAll']);
			$data['title'] = 'STUNTING | Hasil Pencarian';

			$data['content'] = 'publik/cari_wilayah';
			$this->load->view('frontend/template',$data);
			
	}

	function detail_narkoba_wilayah(){
		$id = $this->input->post('id');
		$data['query'] = $this->publik->tampil_data($id);

		$this->load->view('publik/detail_narkoba_wilayah',$data);
	}


	function showkelurahan(){
		$kecamatan = $this->input->post('kecamatan');

		$query = $this->kelurahan->cari_kelurahan($kecamatan);


		if(!empty($query)){
			echo '<select name="kelurahan" id="kelurahan" class="form-control input-sm">';
			echo '<option value="">--Semua Kelurahan--</option>';
			foreach($query as $row):
				echo '<option value="'.$row->id_kelurahan.'">'.$row->nama_kelurahan.'</option>';
			endforeach;
			echo '</option>';
		}else{
			echo '<select name="kelurahan" id="kelurahan" class="form-control input-sm">';
			echo '<option value="">--Semua Kelurahan--</option>';
			echo '</option>';
		}

	}

//end of class
}