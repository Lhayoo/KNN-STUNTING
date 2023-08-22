<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	private $table = 'tbl_menu';

	public function __construct()
	{
	 	parent::__construct();
	 	$this->load->model('menu_model','menu');
	}

	public function index()
	{
		$data['title'] 		= 'Manage Menu';
    $data['title'] = 'Data Menu | Sistem Informasi Stunting';
    $data['menu'] = $this->menu->all()->result_array();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('menu/data', $data);
    
        $this->load->view('templates/footer-datatables');
		
	}

	public function create()
	{
    $data['title'] = 'Tambah Menu | Sistem Informasi Stunting';
    $data['parent']  =  $this->menu->select_parent()->result();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('menu/add', $data);
    
        $this->load->view('templates/footer-datatables');    
	}

  public function processAdd(){
    $this->form_validation->set_rules('title', 'Nama Menu', 'trim|required');
    $this->form_validation->set_rules('parent', 'Parent', 'trim|required');
    $this->form_validation->set_rules('content', 'Content', 'trim|required');
    if($this->form_validation->run() != false){
      $this->menu->simpan_menu();
    }
    $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Menu berhasil ditambahkan!</div>');
    redirect('Menu');
  }

	function edit($id){
    $data['title'] = 'Edit Menu | Sistem Informasi Stunting';
    $data['parent']  =  $this->menu->select_parent()->result();
    $data['menu'] = $this->menu->get_menu_by_id($id);
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
    $this->load->view('menu/edit', $data);
    
    $this->load->view('templates/footer-datatables');
	    
    }

    public function processUpdate(){
        $this->form_validation->set_rules('title', 'Nama Menu', 'trim|required');
        $this->form_validation->set_rules('parent', 'Parent', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        if($this->form_validation->run() != false){
          $this->menu->update();
        }
        $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Menu berhasil diubah!</div>');
        redirect('Menu');
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