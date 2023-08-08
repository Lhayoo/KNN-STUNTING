<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_bumils extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPosyandu');
    }

    public function index() {
        $data['title'] = 'Data Lansia| Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
       
        $bumil = $this->ModelPosyandu->getData('bumil', 'idIbu ');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar-bidan', $data);
            $this->load->view('detail_bumils/index', array('bumil' => $bumil));
            $this->load->view('templates/footer-datatables');
           
       }
    }

    public function detail($idIbu) {
        $cek = $this->ModelPosyandu->cekId('bumil', 'where idIbu = ' . $idIbu);
        if ($cek > 0) {
            $data = $this->ModelPosyandu->getData('bumil', '*', 'where idIbu = ' . $idIbu);
            $status = $this->hitungBBIdeal($idIbu);
            $dataBumil = array('idIbu' => $data[0]['idIbu'],
                'namaBumil' => $data[0]['namaBumil'], 'namaSuami' => $data[0]['namaSuami'],
                'alamatBumil' => $data[0]['alamatBumil'], 'umur' => $data[0]['umur'],
                'usiaKandungan' => $data[0]['usiaKandungan'], 'kandunganKe' => $data[0]['kandunganKe'],
                'tempatLahir' => $data[0]['tempatLahir'], 'tanggalLahir' => $data[0]['tanggalLahir'],
                'beratUpdate' => $data[0]['beratUpdate'], 'beratAwal' => $data[0]['beratAwal'],
                'tinggiIbu' => $data[0]['tinggiIbu'],
                'hpht' => $data[0]['hpht'], 'perkiraanLahir' => $data[0]['perkiraanLahir'],
                'status' => $status
            );
            $this->load->view('templates/header-datatables');
            $this->load->view('templates/sidebar-bidan');
            $this->load->view('detail_bumils/lihat', $dataBumil);
            $this->load->view('templates/footer-datatables');
        } else {
            redirect('Bumil');
        }
    }
}