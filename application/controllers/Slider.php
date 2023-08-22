<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function __construct()
	{
	 	parent::__construct();
    cek_login();
	 	$this->load->model('slider_model','slide');
	}

	public function index()
	{
		$data['title'] 		= 'Slider';
		$data['subtitle']	= 'List Slider';
		$data['query'] = $this->slide->all();
		$this->load->view('admin/header',$data);
    $this->load->view('slider/data',$data);
    $this->load->view('admin/footer');
	}

	public function create()
	{
		$data['title'] 		= 'Slider';
		$data['subtitle']	= 'Create Slider';
		if(isset($_POST['save'])){
			$config['upload_path']='./uploads/slider/';
            $config['allowed_types']='jpg|png|jpeg';
            $this->load->library('upload',$config);
            $this->upload->do_upload();
            $data=  $this->upload->data();
            //echo print_r($data);
            $this->slide->simpan($data['file_name']);
            $this->session->set_flashdata('info','Slider Baru Berhasil Ditambahkan!');
            redirect('slider/create');
		}
		$this->load->view('admin/header',$data);
    $this->load->view('slider/create',$data);
    $this->load->view('admin/footer');
	}

	function edit(){
		$data['title'] 		= 'Slider';
		$data['subtitle']	= 'Edit Slider';
        if(isset($_POST['save'])){
            $config['upload_path']='./uploads/slider/';
            $config['allowed_types']='jpg|png|jpeg';
            $this->load->library('upload',$config);
            $this->upload->do_upload();
            $data=  $this->upload->data();
            $this->slide->update($data['file_name']);
            $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Slider berhasil diubah!</div>');
            redirect('slider');
        }else{
            $id            = $this->uri->segment(3);
            $data['row']   = $this->db->get_where('tbl_slider',array('slide_id'=>$id))->row_array();
						$this->load->view('admin/header',$data);
				    $this->load->view('slider/edit',$data);
				    $this->load->view('admin/footer');
        }
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
