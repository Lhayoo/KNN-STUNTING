<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	private $table = 'tbl_menu';

	public function __construct()
	{
	 	parent::__construct();
    cek_login();
	 	$this->load->model('menu_model','menu');
	}

	public function index()
	{
		$data['title'] 		= 'Manage Menu';
		$data['subtitle']	= 'List menu';
		$data['query'] = $this->menu->all();
    $this->load->view('admin/header',$data);
    $this->load->view('menu/data',$data);
    $this->load->view('admin/footer');
	}

	public function create()
	{
		$data['title'] 		= 'Manage Menu';
		$data['subtitle']	= 'Create menu';
		if(isset($_POST['save'])){
            $this->form_validation->set_rules('title', 'Nama Menu', 'trim|required');
            $this->form_validation->set_rules('parent', 'Parent', 'trim|required');
            $this->form_validation->set_rules('content', 'Content', 'trim|required');
            if($this->form_validation->run() != false){
                $this->menu->simpan();
                $this->session->set_flashdata('info','Menu Baru Berhasil Ditambahkan!');
                redirect('menu/create');
            }
		}
    $data['list_menu']  =  $this->menu->select_parent();
		$this->load->view('admin/header',$data);
    $this->load->view('menu/create',$data);
    $this->load->view('admin/footer');
	}

	function edit(){
		$data['title'] 		= 'Manage Menu';
		$data['subtitle']	= 'Edit menu';
        if(isset($_POST['save'])){
            $this->form_validation->set_rules('title', 'Nama Menu', 'trim|required');
            $this->form_validation->set_rules('parent', 'Parent', 'trim|required');
            $this->form_validation->set_rules('content', 'Content', 'trim|required');
            if($this->form_validation->run() != false){
                $this->menu->update();
								$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Menu berhasil diubah!</div>');
                redirect('menu');
            }
        }else{
            $id                 = $this->uri->segment(3);
            $data['parent']  =  $this->menu->select_parent();
            $data['row']        = $this->db->get_where('tbl_menu',array('menu_id'=>$id))->row_array();
				$this->load->view('admin/header',$data);
		    $this->load->view('menu/edit',$data);
		    $this->load->view('admin/footer');
        }
    }

    function delete(){
        $this->db->where('menu_id',$this->uri->segment(3));
        $this->db->delete('tbl_menu');
				$this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Menu berhasil dihapus!</div>');
        redirect('menu');
    }

}

/* End of file menu.php */
/* Location: ./application/controllers/admin/menu.php */
