<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Laporan_Anak extends CI_Controller {

		public function __construct(){
			parent::__construct();
			
			$this->load->model('ModelPosyandu');
		  }
		  
		  public function index(){
			$data['title'] = 'Laporan Data Penimbangan Balita | Sistem Informasi Stunting';
        	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        	$penimbangan = $this->ModelPosyandu->getPenimbanganBalita();

			if ( $this->input->post('umur') || $this->input->post('status') || $this->input->post('jk') ) {
				$penimbangan = $this->ModelPosyandu->searchDataBalita2();
			}
        
        	if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan_anak/index', array('penimbangan' => $penimbangan));
            $this->load->view('templates/footer-datatables');
           
       }
	}

	public function grafik($id)
	{
		$data['graph'] = $this->ModelPosyandu->grafik_balita($id);
		$data['getById'] = $this->ModelPosyandu->getBalita($id); 
		$this->load->view('laporan_anak/grafik', $data);
		
	}
	public function cetak_grafik($id)
	{
		$data['graph'] = $this->ModelPosyandu->grafik_balita($id);
		$data['getById'] = $this->ModelPosyandu->getBalita($id); 
		$this->load->view('laporan_anak/cetak_grafik', $data);
		
	}
	public function cetak()
	{
		$umur = $this->input->post("umur");
		$status = $this->input->post("status");
		$jk = $this->input->post("jk");

		$data['title'] = 'Laporan Balita| Sistem Informasi Stunting';

		$data['penimbangan'] = $this->ModelPosyandu->searchDataBalita($umur, $status, $jk);
		
		if ($this->form_validation->run() == false) {
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('laporan_anak/cetak', $data);
		}
	}
}