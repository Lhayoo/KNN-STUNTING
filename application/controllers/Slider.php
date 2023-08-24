<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->model('slider_model','slide');
	}

	public function index()
	{
    
    $data['title'] = 'Data Slider | Sistem Informasi Stunting';
    $data['slider'] = $this->slide->all()->result_array();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('slider/data', $data);
    
        $this->load->view('templates/footer-datatables');
	}

	public function create()
	{
    $data['title'] = 'Tambah Slider | Sistem Informasi Stunting';
    // $data['parent']  =  $this->menu->select_parent()->result();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('slider/add', $data);
    
        $this->load->view('templates/footer-datatables');    
	
		}

        public function processAdd(){
           	$config['upload_path']='./uploads/slider/';
            $config['allowed_types']='jpg|png|jpeg';
            $this->load->library('upload',$config);
            $this->upload->do_upload();
            $data=  $this->upload->data();
            //echo print_r($data);
            $this->slide->simpan($data['file_name']);
            $this->session->set_flashdata('info','Slider Baru Berhasil Ditambahkan!');
            redirect('slider');
        }
	

	function edit($id){
    $data['title'] = 'Edit Slider | Sistem Informasi Stunting';
    $data['slider'] = $this->slide->get_slider_by_id($id)->row();
        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('slider/edit', $data);
        $this->load->view('templates/footer-datatables');

    
    }

    function delete(){
        $this->db->where('slide_id',$this->uri->segment(3));
        $this->db->delete('tbl_slider');
				$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Slider berhasil dihapus!</div>');
        redirect('slider');
    }

}

/* End of file Slider.php */
/* Location: ./application/controllers/admin/Slider.php */