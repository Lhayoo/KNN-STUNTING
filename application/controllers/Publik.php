<?php

class Publik extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array(
			'm_jenis_narkoba'=>'jnarkoba',
			'm_kecamatan'=>'kecamatan',
			'm_kelurahan'=>'kelurahan',
			'm_publik'=>'publik',
			'm_dashboard'=>'dashboard'));

	}


	function index(){
		$data['title'] = 'SIGAP | SIG NARKOBA POLRES PEKALONGAN KOTA';

		$data['jenis_narkoba'] = $this->jnarkoba->tampil_jnarkoba()->result();
		$data['kecamatan'] = $this->kecamatan->tampil_kecamatan()->result();
		$data['jml_Sabu-sabu'] = $this->db->query('SELECT * FROM tb_narkoba WHERE id_jenis_narkoba = 1')->num_rows();
		$data['jml_Ganja'] = $this->db->query('SELECT * FROM tb_narkoba WHERE id_jenis_narkoba = 2')->num_rows();
		$data['jml_Alphrazolam'] = $this->db->query('SELECT * FROM tb_narkoba WHERE id_jenis_narkoba = 3')->num_rows();
		$data['jml_Dextro'] = $this->db->query('SELECT * FROM tb_narkoba WHERE id_jenis_narkoba = 4')->num_rows();
		$data['jml_narkoba'] = $this->db->query('SELECT * FROM tb_narkoba')->num_rows();
		$data['jml_kec'] = $this->db->query('SELECT * FROM tb_kecamatan')->num_rows();
		$data['title'] = 'SIGAP | SIG Sebaran Kasus Narkoba Polres Pekalongan Kota';
		
		$this->load->view('frontend/header',$data);
		$this->load->view('publik/main',$data);

		$this->load->view('frontend/footer',$data);
		// $data['content'] = 'frontend/home';
		// $this->load->view('frontend/template',$data);
	}

	function cari_wilayah(){
		$jnarkoba = $this->input->post('jnarkoba');
		$kecamatan= $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$periode = $this->input->post('periode');



			$data['jnarkoba'] = $jnarkoba;
			$data['kecamatan'] = $kecamatan;
			$data['kelurahan'] = $kelurahan;
			$data['periode'] = $periode;

			$data['keclist'] = $this->kecamatan->tampil_kecamatan()->result();
			$data['laylist'] = $this->jnarkoba->tampil_jnarkoba()->result();

			$data['query'] = $this->publik->ambil_narkoba_wilayah($kecamatan,$kelurahan,$jnarkoba, $periode)->result();
			$data['jumlah'] = $this->publik->ambil_jumlah_narkoba_wilayah($kecamatan,$kelurahan,$jnarkoba, $periode)->num_rows();

			$data['title'] = 'SIGAP | Hasil Pencarian';

			$data['content'] = 'publik/cari_wilayah';
			$this->load->view('frontend/template',$data);


	}

	function detail_narkoba_wilayah(){
		$knarkoba = $this->input->post('kode_narkoba');
		$data['query'] = $this->publik->tampil_narkoba_wilayah($knarkoba);

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
			echo 'Kelurahan tidak ditemukan';
		}

	}

//end of class
}
