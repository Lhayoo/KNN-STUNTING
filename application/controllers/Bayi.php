<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BayiModel');
	}

    public function index() {
        $data['title'] = 'Data Balita | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['bayi'] = $this->BayiModel->showBayi();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('bayi/bayi', $data);
            $this->load->view('templates/footer-datatables');
           
       }
    }

	public function tambah_data_bayi()
	{
		if($this->input->post('simpan')) 
		{
			$this->form_validation->set_message('required', 'Tidak Boleh Kosong');
			$this->form_validation->set_rules('namaBayi', 'Nama Balita', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'trim|required');
            $this->form_validation->set_rules('tempatLahir', 'Tanggal Lahir', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('umur', 'Umur', 'trim|required|numeric');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('NamaAyah', 'Nama Ayah', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('namaIbu', 'Nama ibu', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('nik', 'Nik', 'trim|required|numeric');
            if ($this->form_validation->run() == FALSE)
			{
				$data['title'] = "Tambah Data Balita";
                $this->load->view('templates/header-datatables', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('bayi/tambah_bayi', $data);
                $this->load->view('templates/footer-datatables');
			}
			else
			{
				$config['upload_path'] = './assets/foto';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '4096';

				$this->load->library('upload', $config);
				if($this->upload->do_upload('foto'))
				{
					$file = array('upload_data' => $this->upload->data());

					$namaBayi = $this->input->post('namaBayi');
					$tempatLahir = $this->input->post('tempatLahir');
                    $tanggalLahir = $this->input->post('tanggalLahir');
					$jk = $this->input->post('jk');
					$namaAyah = $this->input->post('namaAyah');
					$namaIbu = $this->input->post('namaIbu');
					$nik = $this->input->post('nik');
					
					$obj = array(
						'namaBayi' => $namaBayi,
						'tempatLahir' => $tempatLahir,
                        'tanggalLahir' => $tanggalLahir,
						'jk' => $jk,
						'namaAyah' => $namaAyah,
						'namaIbu' => $namaIbu,
						'nik' => $nik,
						
					);
					$this->BayiModel->insertBayi($obj);
					$this->session->set_flashdata('alert',"Berhasil Disimpan");
					redirect('Bayi','refresh');
				}
			}
		}
		else 
		{
			$data['content'] = 'bayi/tambah_bayi';
			$data['title'] = "Tambah Data Balita";
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('balita/index', $data);
            $this->load->view('templates/footer-datatables');
		}
	}

	public function detail_bayi($id)
	{
		
		$res = $this->BayiModel->getBayi($id);
		$data['content'] = 'bayi/detail_bayi';
		$data['title'] = "Detail ".$res->nama_bayi." - Stunting";
		$data['balita'] = $this->BayiModel->getBayi($id);
        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('balita/index', $data);
        $this->load->view('templates/footer-datatables');
	}

	public function edit_data_bayi($id)
	{
		
		if($this->input->post('simpan'))
		{
			if(empty($_FILES['foto']['name'])) 
			{
				$this->form_validation->set_message('required', 'Tidak Boleh Kosong');
                $this->form_validation->set_rules('namaBayi', 'Nama Balita', 'trim|required|alpha_numeric_spaces');
			    $this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'trim|required');
                $this->form_validation->set_rules('tempatLahir', 'Tanggal Lahir', 'trim|required');
                $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
                $this->form_validation->set_rules('umur', 'Umur', 'trim|required|numeric');
			    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
			    $this->form_validation->set_rules('NamaAyah', 'Nama Ayah', 'trim|required|alpha_numeric_spaces');
			    $this->form_validation->set_rules('namaIbu', 'Nama ibu', 'trim|required|alpha_numeric_spaces');
				if($this->form_validation->run() == FALSE)
				{
					$data['content'] = 'bayi/edit_bayi';
					$data['title'] = "Edit Data Bayi - Stunting";
					$data['balita'] = $this->BayiModel->getBayi($id); 
					$this->load->view('templates/header-datatables', $data);
                    $this->load->view('templates/sidebar', $data);
                    $this->load->view('balita/index', $data);
                    $this->load->view('templates/footer-datatables');
				} 
				else
				{
                    $namaBayi = $this->input->post('namaBayi');
					$tempatLahir = $this->input->post('tempatLahir');
                    $tanggalLahir = $this->input->post('tanggalLahir');
					$jk = $this->input->post('jk');
					$namaAyah = $this->input->post('namaAyah');
					$namaIbu = $this->input->post('namaIbu');
					$nik = $this->input->post('nik');
					$obj3 = array(
						'namaBayi' => $namaBayi,
						'tempatLahir' => $tempatLahir,
                        'tanggalLahir' => $tanggalLahir,
						'jk' => $jk,
						'namaAyah' => $namaAyah,
						'namaIbu' => $namaIbu,
						'nik' => $nik
					);
					$this->db->where('idBalita', $id);
					$this->BayiModel->updateBayi($obj3);
					$this->session->set_flashdata('alert',"Berhasil Diedit");
					redirect('Bayi');
				}
			}
			else
			{
                $this->form_validation->set_rules('namaBayi', 'Nama Bayi', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('tanggalLahir', 'Tanggal Lahir', 'trim|required');
            $this->form_validation->set_rules('tempatLahir', 'Tanggal Lahir', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('umur', 'Umur', 'trim|required|numeric');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('NamaAyah', 'Nama Ayah', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('namaIbu', 'Nama ibu', 'trim|required|alpha_numeric_spaces');
			$this->form_validation->set_rules('nik', 'Nik', 'trim|required|numeric');
				if($this->form_validation->run() == FALSE)
				{
					$data['bayi'] = 'bayi/edit_bayi';
					$data['title'] = "Edit Data Bayi - Posyandu";
					$data['balita'] = $this->BayiModel->getBayi($id); 
					$this->load->view('home', $data);
				}
				else
				{
					$obj2 = $this->BayiModel->getBayi($id);
					unlink('./assets/foto/'.$obj2->foto_bayi);

					$config['upload_path'] = './assets/foto';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size'] = '4096';

					$this->load->library('upload', $config);
					if($this->upload->do_upload('foto'))
					{
						$file = array('upload_data' => $this->upload->data());

                            $namaBayi = $this->input->post('namaBayi');
                            $tempatLahir = $this->input->post('tempatLahir');
                            $tanggalLahir = $this->input->post('tanggalLahir');
                            $jk = $this->input->post('jk');
                            $namaAyah = $this->input->post('namaAyah');
                            $namaIbu = $this->input->post('namaIbu');
                            $nik = $this->input->post('nik');
                            
                            $obj = array(
                                'namaBayi' => $namaBayi,
                                'tempatLahir' => $tempatLahir,
                                'tanggalLahir' => $tanggalLahir,
                                'jk' => $jk,
                                'namaAyah' => $namaAyah,
                                'namaIbu' => $namaIbu,
                                'nik' => $nik,
                                    
						);
						$this->db->where('idBalita', $id);
						$this->BayiModel->updateBayi($obj);
						$this->session->set_flashdata('alert',"Berhasil Diedit");
						redirect('Bayi','refresh');
					}
				}
			}
		} 
		else
		{
			$data['bayi'] = 'bayi/edit_bayi';
			$data['title'] = "Edit Data Bayi - Posyandu";
			$data['bayi'] = $this->BayiModel->getBayi($id); 
			$this->load->view('home', $data);
		}
	}

	public function hapus_data_bayi($id)
	{
		
		$obj2 = $this->BayiModel->getBayi($id);
		unlink('./assets/foto/'.$obj2->foto);

		$this->BayiModel->deleteBayi($id);
		$this->session->set_flashdata('alert',"Berhasil Dihapus");
		redirect('Bayi');
	}
}
/* End of file bayi.php */
/* Location: ./application/controllers/bayi.php */