<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPosyandu');
    }

    public function index() {
        $data['title'] = 'Data Balita | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $balita = $this->ModelPosyandu->getData('balita', '*');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('balita/index', array('balita' => $balita));
            $this->load->view('templates/footer-datatables');
       }
    }

    public function add() {
        $this->load->view('templates/header-datatables');
        $this->load->view('templates/sidebar');
        
        $this->load->view('balita/input');
        $this->load->view('templates/footer-datatables');
    }

    public function processAdd() {
        $idBalita = $_POST['idBalita'];
        $namaBayi = $_POST['namaBayi'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $alamat = $_POST['alamat'];
        $namaIbu = $_POST['namaIbu'];
        $namaAyah = $_POST['namaAyah'];

        $umur = $_POST['umur'];
        $beratLahir = $_POST['beratLahir'];
        $panjangLahir = $_POST['panjangLahir'];
        $telp_ibu = $_POST['telp_ibu'];
        $lingkar_kepala = $_POST['lingkar_kepala'];
        $goldar = $_POST['goldar'];

        $now = date("Y-m-d");
        $datetime1 = new DateTime($tanggalLahir);
        $datetime2 = new DateTime($now);
        $difference = $datetime1->diff($datetime2)->days;
        if (!isset($namaBayi) || trim($namaBayi) == '' || !isset($tempatLahir) || trim($tempatLahir) == '' || 
        !isset($namaIbu) || trim($namaIbu) == '' || !isset($namaAyah) || trim($namaAyah) == '' || !isset($alamat) || trim($alamat) == '' || 
        !isset($tanggalLahir) || trim($tanggalLahir) == '' || !isset($jenisKelamin) || trim($jenisKelamin) == '' ) {
            redirect('Balita/add');
        } else {
            $tambah_data = array(
                'idBalita' => $idBalita, 
                'namaBayi' => $namaBayi, 
                'namaIbu' => $namaIbu, 
                'namaAyah' => $namaAyah, 
                'alamat' => $alamat,
                'tempatLahir' => $tempatLahir, 
                'tanggalLahir' => $tanggalLahir, 

                'umur' => $umur, 
                'panjangLahir' => $panjangLahir, 
                'lingkar_kepala' => $lingkar_kepala,
                'beratLahir' => $beratLahir, 
                'telp_ibu' => $telp_ibu, 
                'goldar' => $goldar,

                'jenisKelamin' => $jenisKelamin
            );
            $res = $this->ModelPosyandu->addData('balita', $tambah_data);
            if ($res >= 1) {
                $this->session->set_flashdata('msg', 'Berhasil Ditambah');

                redirect('Balita');}}}

    public function informasiBayi($idBalita) {
        $data = $this->ModelPosyandu->getData('balita', '*', 'where id = "' . $idBalita . '"');
       
        $balita = array(
            'id' => $data[0]['id'],
            'idBalita' => $data[0]['idBalita'],
            'namaBayi' => $data[0]['namaBayi'], 
            'namaIbu' => $data[0]['namaIbu'], 
            'namaAyah' => $data[0]['namaAyah'], 
            'alamat' => $data[0]['alamat'],
            'tempatLahir' => $data[0]['tempatLahir'],
            'tanggalLahir' =>  $data[0]['tanggalLahir'], 
            'umur' => $data[0]['umur'],
            'panjangLahir' => $data[0]['panjangLahir'],
            'lingkar_kepala' => $data[0]['lingkar_kepala'],
            'beratLahir' => $data[0]['beratLahir'],
            'telp_ibu' => $data[0]['telp_ibu'],
            'goldar' => $data[0]['goldar'],
            'jenisKelamin' => $data[0]['jenisKelamin']
        );
        return $balita;
    }

    public function detail($idBalita) {
        $cek = $this->ModelPosyandu->cekId('balita', 'where id = "' . $idBalita . '"');
        if ($cek > 0) {
            $data = $this->informasiBayi($idBalita);
            $this->load->view('templates/header-datatables');
            $this->load->view('templates/sidebar');
            $this->load->view('balita/detail_Balita', $data);
            $this->load->view('templates/footer-datatables');
        } else {
            redirect('Balita');
        }
    }

    public function edit($idBalita) {
        $cek = $this->ModelPosyandu->cekId('balita', 'where id = "' . $idBalita . '"');
        if ($cek > 0) {
            $data = $this->informasiBayi($idBalita);
            $this->load->view('templates/header-datatables');
            $this->load->view('templates/sidebar');
            $this->load->view('balita/edit_Balita', $data);
            $this->load->view('templates/footer-datatables');
        } else {
            redirect('Balita');
        }
    }

    public function doUpdate() {
        $id = $_POST['id'];
        $idBalita = $_POST['idBalita'];
        $namaBayi = $_POST['namaBayi'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $tempatLahir = $_POST['tempatLahir'];
        $jenisKelamin = $_POST['jenisKelamin'];
        
        $namaIbu = $_POST['namaIbu'];
        $namaAyah= $_POST['namaAyah'];
        $alamat = $_POST['alamat'];
        $umur = $_POST['umur'];
        $beratLahir = $_POST['beratLahir'];
        $panjangLahir = $_POST['panjangLahir'];
        $telp_ibu = $_POST['telp_ibu'];
        $lingkar_kepala = $_POST['lingkar_kepala'];
        $goldar = $_POST['goldar'];
        
        $update_data = array(
            'idBalita' => $idBalita,
            'namaBayi' => $namaBayi,
            'tanggalLahir' => $tanggalLahir,
            'tempatLahir' => $tempatLahir,
            'namaIbu' => $namaIbu,
            'namaAyah' => $namaAyah,
            'alamat' => $alamat,
            'umur' => $umur,
            'beratLahir' => $beratLahir,
            'panjangLahir' => $panjangLahir,
            'telp_ibu' => $telp_ibu,
            'lingkar_kepala' => $lingkar_kepala,
            'goldar' => $goldar,
            'jenisKelamin' => $jenisKelamin
        );
        $where = array('id' => $id);
        $res = $this->ModelPosyandu->UpdateData('balita', $update_data, $where);
        if ($res >= 1) {
            $this->session->set_flashdata('msg', 'Berhasil Diupdate');
            redirect('Balita');
        }
        }

    public function delete($idBalita) {
        $where = array('id' => $idBalita);
        $res = $this->ModelPosyandu->HapusData('balita', $where);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');
        if ($res >= 1) {
            redirect('Balita');}}

}