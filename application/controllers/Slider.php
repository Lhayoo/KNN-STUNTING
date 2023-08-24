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

    function processUpdate(){
        $config['upload_path']='./uploads/slider/';
        $config['allowed_types']='jpg|png|jpeg';
        $this->load->library('upload',$config);
        if($this->upload->do_upload('userfile')==NULL){ 
            $id = $this->input->post('id');
            $data = array(
                'slide_title' => $this->input->post('title'),
                'slide_desc' => $this->input->post('desc'),
                'status' => $this->input->post('status'),
            );
            $this->slide->update($id,$data);
            redirect('slider');
        }else{
            $id = $this->input->post('id');
            $slide = $this->slide->get_slider_by_id($id)->row();
            unlink('./uploads/slider/'.$slide->slide_image);
            $data=  $this->upload->data();
            $data = array(
                'slide_title' => $this->input->post('title'),
                'slide_desc' => $this->input->post('desc'),
                'status' => $this->input->post('status'),
                'slide_image' => $data['file_name'],
            );
            $this->slide->update($id,$data);
            redirect('slider');
        }
    }

    function delete($id){
        $slide = $this->slide->get_slider_by_id($id)->row();
            unlink('./uploads/slider/'.$slide->slide_image);
        $this->slide->delete($id);
        redirect('slider');
    }

}

/* End of file Slider.php */
/* Location: ./application/controllers/admin/Slider.php */