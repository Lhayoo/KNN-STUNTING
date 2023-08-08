<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PesertaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPosyandu');
    }

    public function balita()
    {
        $data['title'] = 'Laporan Balita | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
        $penimbangan = $this->ModelPosyandu->getPenimbanganBalita();
    
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-pengguna', $data);
            $this->load->view('laporan_anak/index', array('penimbangan' => $penimbangan));
            $this->load->view('templates/footer-datatables');
        }
    }

    public function lansia() {
        $data['title'] = 'Laporan Lansia| Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        // $lansia = $this->ModelPosyandu->getData('penimbanganlansia', '*');
        $data['penimbanganlansia'] = $this->ModelPosyandu->getPenimbanganLansia();
        
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-pengguna', $data);
        $this->load->view('laporan_lansia/index', $data);
        $this->load->view('templates/footer-datatables');
           
       }
    }

    public function bumil(){
        $data['title'] = 'Laporan Data Ibu Hamil | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
        $bumil = $this->ModelPosyandu->getPenimbanganBumil();
    
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar-pengguna', $data);
        $this->load->view('laporan_ibuhamil/index', array('penimbanganbumil' => $bumil));
        $this->load->view('templates/footer-datatables');
        }
    }
}