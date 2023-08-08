<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPosyandu');
    }

    public function hitungBBUlaki($id_anak) {
        $data = $this->ModelPosyandu->getData('anak', '*', 'where id_anak = ' . $id_anak);
        $beratLahir = $data[0]['beratLahir'];
        $panjangLahir = $data[0]['umurLahir'];
        $beratUpdate = $data[0]['beratUpdate'];
        if ($tinggiIbu >= 160) {
            $ntb = "110";
        } elseif ($tinggiIbu < 160 && $tinggiIbu >= 150) {
            $ntb = "105";
        } else {
            $ntb = "100";
        }
        $bbi = $tinggiIbu - $ntb;
        $beratIdeal = $bbi + ($usiaKandungan * (7 / 20));
        if ($beratUpdate == $beratIdeal) {
            $status = '<div class="alert alert-success">Ideal</div>';
        } elseif ($beratUpdate < $beratIdeal) {
            $status = '<div class="alert alert-warning">Terlalu Kurus</div>';
        } else {
            $status = '<div class="alert alert-danger">Terlalu Gemuk</div>';
        }
        return $status;
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
        $data = $this->ModelPosyandu->dataTerakhir();
        $balita = $this->ModelPosyandu->getData('balita', 'MAX(RIGHT(idBalita,3)) AS last');
        $lastId = array('last' => $balita[0]['last']);
        $last = implode("", $lastId);
        $kode = "";
        $baru = 1;
        if ($data->num_rows() > 0) {
            $baru = $last + 1;
            $kode = str_pad($baru, 4, "0", STR_PAD_LEFT);
        }
        $namaBayi = $_POST['namaBayi'];
        $namaIbu = $_POST['namaIbu'];
        $namaAyah = $_POST['namaAyah'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $anakKe = $_POST['anakKe'];
        $alamatOrtu = $_POST['alamatOrtu'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $golonganDarah = $_POST['golonganDarah'];
        $panjangLahir = $_POST['panjangLahir'];
        $beratLahir = $_POST['beratLahir'];
        if (!isset($namaBayi) || trim($namaBayi) == '' || !isset($namaIbu) || trim($namaIbu) == '' || 
        !isset($namaAyah) || trim($namaAyah) == '' || !isset($tempatLahir) || trim($tempatLahir) == '' || 
        !isset($tanggalLahir) || trim($tanggalLahir) == '' || !isset($alamatOrtu) || trim($alamatOrtu) == '' || 
        !isset($anakKe) || trim($anakKe) == '' || !isset($jenisKelamin) || trim($jenisKelamin) == '' || 
        !isset($golonganDarah) || trim($golonganDarah) == '' || !isset($panjangLahir) || trim($panjangLahir) == '' ||
        !isset($beratLahir) || trim($beratLahir) == '') {
            $idBalita = NULL;
        } else {
            $idBalita = 'BALITA' . $kode;
        }
        $now = date("Y-m-d");
        $datetime1 = new DateTime($tanggalLahir);
        $datetime2 = new DateTime($now);
        $difference = $datetime1->diff($datetime2)->days;
        $usiaBayi = ceil($difference / 30);

        if ($jenisKelamin == 1) {
            $jkDB = 0;
        } else {
            $jkDB = 1;
        }
        if ($idBalita == NULL) {
            redirect('Balita/add');
        } else {
            $tambah_data = array(
                'idBalita' => $idBalita, 'namaBayi' => $namaBayi,
                'namaIbu' => $namaIbu, 'namaAyah' => $namaAyah,
                'tempatLahir' => $tempatLahir, 'tanggalLahir' => $tanggalLahir,
                'alamatOrtu' => $alamatOrtu, 'anakKe' => $anakKe,
                'jenisKelamin' => $jkDB, 'golonganDarah' => $golonganDarah,
                'usiaBayi' => $usiaBayi,
                'beratLahir' => $beratLahir, 'panjangLahir' => $panjangLahir,
                'beratSekarang' => $beratLahir, 'panjangSekarang' => $panjangLahir
            );
            $res = $this->ModelPosyandu->addData('balita', $tambah_data);
            if ($res >= 1) {
                redirect('Balita');}}}

    public function informasiBayi($idBalita) {
        $data = $this->ModelPosyandu->getData('balita', '*', 'where idBalita = "' . $idBalita . '"');
        $jkArr = array('jenisKelamin' => $data[0]['jenisKelamin']);
        $golArr = array('golonganDarah' => $data[0]['golonganDarah']);
        $kodeJenis = implode("", $jkArr);
        $kodeGol = implode("", $golArr);
        if ($kodeJenis == 0) {
            $jenisKelamin = "Laki-Laki";
        } else {
            $jenisKelamin = "Perempuan";
        }
        if ($kodeGol == 'BT') {
            $golonganDarah = "Belum Tahu";
        } else {
            $golonganDarah = $kodeGol;
        }
        $balita = array(
            'idBalita' => $data[0]['idBalita'], 'namaBayi' => $data[0]['namaBayi'],
            'namaIbu' => $data[0]['namaIbu'], 'namaAyah' => $data[0]['namaAyah'],
            'tanggalLahir' => $data[0]['tanggalLahir'], 'tempatLahir' => $data[0]['tempatLahir'],
            'alamatOrtu' => $data[0]['alamatOrtu'], 'anakKe' => $data[0]['anakKe'],
            'panjangLahir' => $data[0]['panjangLahir'], 'beratLahir' => $data[0]['beratLahir'],
            'jenisKelamin' => $jenisKelamin, 'golonganDarah' => $golonganDarah,
            'panjangSekarang' => $data[0]['panjangSekarang'], 'beratSekarang' => $data[0]['beratSekarang']
        );
        return $balita;
    }

    public function detail($idBalita) {
        $cek = $this->ModelPosyandu->cekId('balita', 'where idBalita = "' . $idBalita . '"');
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
        $cek = $this->ModelPosyandu->cekId('balita', 'where idBalita = "' . $idBalita . '"');
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
        $idBalita = $_POST['idBalita'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $alamatOrtu = $_POST['alamatOrtu'];
        $golonganDarah = $_POST['golonganDarah'];
        $panjangSekarang = $_POST['panjangSekarang'];
        $beratSekarang = $_POST['beratSekarang'];
        if (!isset($panjangSekarang) || trim($panjangSekarang) == '' ||
                !isset($beratSekarang) || trim($beratSekarang) == '') {
            redirect('Balita/edit/' . $idBalita);
        } else {
            $update_data = array(
                'alamatOrtu' => $alamatOrtu,
                'golonganDarah' => $golonganDarah,
                'panjangSekarang' => $panjangSekarang,
                'beratSekarang' => $beratSekarang
            );
            $where = array('idBalita' => $idBalita);
            $res = $this->ModelPosyandu->UpdateData('balita', $update_data, $where);
            if ($res >= 1) {
                redirect('Balita/detail/' . $idBalita);}}}

    public function delete($idBalita) {
        $where = array('idBalita' => $idBalita);
        $res = $this->ModelPosyandu->HapusData('balita', $where);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');
        if ($res >= 1) {
            redirect('Balita');}}

}
