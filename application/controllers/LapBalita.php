<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LapBalita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bidan_Model');
    }
		  
	public function index() {
        $data['title'] = 'Data Balita| Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $balita = $this->Bidan_Model->getDataBalita('penimbangan', 'Dinda Kartika Sari');
        
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-bidan', $data);
        $this->load->view('laporan_bumil/index', array('penimbangan' => $balita));
        $this->load->view('templates/footer-datatables');
           
       }
    }
}