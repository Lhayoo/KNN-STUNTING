<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penimbangan_Balita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPosyandu');
    }

    public function hitungBBUlaki($idBayi) {
        $data = $this->ModelPosyandu->getData('balita', '*', 'where idBayi = ' . $idBayi);
        $beratAwal = $data[0]['beratAwal'];
        $umur = $data[0]['umur'];
        $beratUpdate = $data[0]['beratUpdate'];
        if ($beratAwal >= 160) {
            $ntb = "110";
        } elseif ($beratAwal < 160 && $beratAwal >= 150) {
            $ntb = "105";
        } else {
            $ntb = "100";
        }
        $bbi = $beratAwal - $ntb;
        $beratIdeal = $bbi + ($umur * (7 / 20));
        if ($beratUpdate == $beratIdeal) {
            $status = '<div class="alert alert-success">Ideal</div>';
        } elseif ($beratUpdate < $beratIdeal) {
            $status = '<div class="alert alert-warning">Gizi Kurang</div>';
        } else {
            $status = '<div class="alert alert-danger">Gizi Lebih</div>';
        }
        return $status;
    }
    public function index() {
        $data['title'] = 'Penimbangan Balita | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $balita = $this->ModelPosyandu->getData('balita', '*');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('penimbangan_balita/index', array('balita' => $balita));
            $this->load->view('templates/footer-datatables');
           
       }

    }

    public function add() {
        $data['balita'] = $this->ModelPosyandu->getData('balita', '*');

        $this->load->view('templates/header-datatables');
        $this->load->view('templates/sidebar');
        
        $this->load->view('penimbanganbalita/input', $data);
        $this->load->view('templates/footer-datatables');
    }

    public function penimbangan_bayi($id)
	{
		if($this->input->post('simpan')) {
			$beratLahir = $this->input->post('beratLahir');
			$panjangLahir = $this->input->post('panjangLahir');
			$tgl_skrng = date('Y-m-d');
			$obj = array(
				"idBalita" => $id,
				"beratLahir" => $beratLahir,
				"panjangLahir" => $panjangLahir,
				"tgl_skrng" => $tgl_skrng
			);
			$this->ModelPosyandu->insertPenimbangan($obj);
			redirect('Penimbangan_Balita/penimbangan_bayi/'.$id,'refresh');
		} else {
			
			$res = $this->ModelPosyandu->getBayi($id);
			$data['title'] = "Data Penimbangan ".$res->namaBayi." - Posyandu";
			$data['balita'] = $this->ModelPosyandu->getBayi($id);
			$data['penimbangan'] = $this->ModelPosyandu->showPenimbangan($id)->result_object();
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('penimbangan_balita/penimbangan_bayi', $data);
            $this->load->view('templates/footer-datatables');
		}
	}

	public function edit_penimbangan($id) {
		
		if($this->input->post('edit')) {
			$idBalita = $this->input->post("idBalita");
			$beratLahir = $this->input->post('beratLahir');
			$panjangLahir = $this->input->post('panjangLahir');
			$obj = array(
				"beratLahir" => $beratLahir,
				"panjangLahir" => $panjangLahir
			);
			$this->db->where('idpBalita', $id);
			$this->ModelPosyandu->updatePenimbangan($obj);
			redirect('Penimbangan_Balita/penimbangan_bayi/'.$id,'refresh');
		}
	}

    public function penimbangan_grafik($id) {
        if($this->session->userdata('username') == "") {
			redirect('Login','refresh');
		}

		$data['penimbangan'] = 'penimbangan/grafik_berat';
		$res = $this->ModelPosyandu->getBayi($id);
		$data['title'] = "Data Penimbangan ".$res->namaBayi." - Posyandu";
		$data['balita'] = $this->ModelPosyandu->getBayi($id);
		$data['penimbangan'] = $this->ModelPosyandu->showPenimbangan($id)->result_object();
        
		$this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('penimbangan_balita/grafik_berat', $data);
        $this->load->view('templates/footer-datatables');
	}

	public function grafik_tinggibadan($id) {
		if($this->session->userdata('username') == "") {
			redirect('Login','refresh');
		}

		$data['penimbangan'] = 'penimbangan/grafik_tinggi';
		$res = $this->ModelPosyandu->getBayi($id);
		$data['title'] = "Data Penimbangan ".$res->namaBayi." - Posyandu";
		$data['balita'] = $this->ModelPosyandu->getBayi($id);
		$data['penimbangan'] = $this->ModelPosyandu->showPenimbangan($id)->result_object();
		$this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('penimbangan_balita/grafik_tinggi', $data);
        $this->load->view('templates/footer-datatables');
	}

	public function hitungBBIdeal($idBelita) {
        $data = $this->ModelPosyandu->getData('penimbangan', '*', 'where idpBalita = ' . $idBelita);
        $panjangLahir = $data[0]['panjangLahir'];
        $beratLahir = $data[0]['beratLahir'];
        if ($panjangLahir >= 160) {
            $ntb = "110";
        } elseif ($panjangLahir < 160 && $panjangLahir >= 150) {
            $ntb = "105";
        } else {
            $ntb = "100";
        }
        $bbi = $panjangLahir - $ntb;
        $beratIdeal = $bbi-22;
        if ($beratLahir == $beratIdeal) {
            $status = '<div class="alert alert-success">Ideal</div>';
        } elseif ($beratLahir < $beratIdeal) {
            $ideal1 = $beratLahir+22;
            $status = '<div class="alert alert-warning">Terlalu Kurus, butuh <b>'.$ideal1.'</b> supaya Ideal</div>';
        } else {
            $ideal2 = $beratLahir+22;
            $status = '<div class="alert alert-danger">Terlalu Gemuk, butuh <b>'.$ideal2.'</b> supaya Ideal</div>';
        }
        return $status;
    }
    public function BbIdeal($id)
    {
        $data = $this->ModelPosyandu->getData('penimbangan', '*', 'where idpBalita = ' . $id);
        $panjangLahir = $data[0]['panjangLahir'];
        $beratLahir = $data[0]['beratLahir'];
        if ($panjangLahir >= 160) {
            $ntb = "110";
        } elseif ($panjangLahir < 160 && $panjangLahir >= 150) {
            $ntb = "105";
        } else {
            $ntb = "100";
        }
        $bbi = $panjangLahir - $ntb;
        $beratIdeal = $bbi-22;
        if ($beratLahir == $beratIdeal) {
            $status = 'Ideal';
        } elseif ($beratLahir < $beratIdeal) {
            $status = 'Terlalu Kurus';
        } else {
            $status = 'Terlalu Gemuk';
        }
        return $status;
    }

	public function detail($idBalita) {
        $data['title'] = 'Data Penimbangan Balita | Sistem Informasi Stunting';
        $data['getDetailBalita'] = $this->ModelPosyandu->getDetailBalita($idBalita);
        $data['status'] = $this->hitungBBIdeal($idBalita);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('penimbanganbalita/detail', $data);
            $this->load->view('templates/footer-datatables');
       }
    }

    public function processAdd() {
        $idBalita = $_POST['idBalita'];
        $tgl_skrng = $_POST['tgl_skrng'];
        $beratLahir = $_POST['beratLahir'];
        $panjangLahir = $_POST['panjangLahir'];
        $now = date("Y-m-d");

        $status = $this->BbIdeal($idBalita);

        $tambah_data = array(
            'idBalita' => $idBalita,
            'tgl_skrng' => $tgl_skrng,
            'beratLahir' => $beratLahir,
            'panjangLahir' => $panjangLahir, 
            'status' => $status, 
        );
        $res = $this->ModelPosyandu->addData('penimbangan', $tambah_data);
        if ($res >= 1) {
            redirect('penimbangan_balita');
        }
    }

    public function delete($idBalita) {
        $where = array('idpBalita' => $idBalita);
        $res = $this->ModelPosyandu->HapusData('penimbangan', $where);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');
        if ($res >= 1) {
            redirect('balita');
        }
    }

    public function detail_hitung($id)
    {
        $data['title'] = 'Data Penimbangan Balita | Sistem Informasi Stunting';
        $data['balita'] = $this->ModelPosyandu->getBalita($id);
        // $data['masterbumil'] = $this->ModelPosyandu->getData('penimbanganbumil', '*');
        $data['getPenimbanganDetailBalita'] = $this->ModelPosyandu->getPenimbanganDetailBalita($id);
        
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('balita/detail_hitung', $data);
            $this->load->view('templates/footer-datatables');
           
       }
    }


}
