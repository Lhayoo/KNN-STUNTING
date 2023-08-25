<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('blog_model','blog');
  }

  function index()
  {
     $data['title'] = 'Data Video | Sistem Informasi Stunting';
    $data['video'] = $this->blog->all_video()->result_array();
    $this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('Video/data', $data);
    
        $this->load->view('templates/footer-datatables');
  }

  public function create()
	{
    $data['title'] = 'Data Video | Sistem Informasi Stunting';
    $data['video'] = $this->blog->all_video()->result_array();
    $this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('Video/add', $data);
    
        $this->load->view('templates/footer-datatables');
  }
  public function processAdd(){
    $post_by = $this->session->userdata('id_users');
    $data=array(
      'post_title'    =>  $this->input->post('title'),
      'post_content'  =>  $this->input->post('link'),
      'post_type'     =>  'video',
      'post_by'       =>  $post_by,
      'post_date'     =>  date('Y-m-d'),
      'post_slug'     =>  seo_title($this->input->post('title'))

    );
    $this->blog->simpan($data);
    $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Video berhasil ditambahkan!</div>');
    redirect('video');
  }
  
  function edit($id){
      $data['title'] = 'Edit Video | Sistem Informasi Stunting';
    $data['video'] = $this->blog->all_video($id)->row();
    $this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('Video/edit', $data);
    
        $this->load->view('templates/footer-datatables');
  }

  public function processUpdate(){
    $post_by = $this->session->userdata('id_users');
    $id = $this->input->post('id');
    $data=array(
      'post_title'    =>  $this->input->post('title'),
      'post_content'  =>  $this->input->post('link'),
      'post_type'     =>  'video',
      'post_by'       =>  $post_by,
      'post_date'     =>  date('Y-m-d'),
      'post_slug'     =>  seo_title($this->input->post('title'))

    );
   $this->blog->update($data,$id);
    $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Video berhasil diubah!</div>');
    redirect('video');
  }
  function delete($id){
    $this->blog->delete($id);
      $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Video berhasil dihapus!</div>');
      redirect('video');
  }


}