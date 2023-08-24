<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
	 	$this->load->model('blog_model','blog');
  }

  function index()
  {
    $data['title'] = 'Data Artikel | Sistem Informasi Stunting';
    $data['blog'] = $this->blog->all()->result_array();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('Blog/data', $data);
    
        $this->load->view('templates/footer-datatables');
  }

  public function create()
	{
		$data['title'] = 'Tambah Menu | Sistem Informasi Stunting';
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('blog/add', $data);

        $this->load->view('templates/footer-datatables');    
	
	}

  public function processAdd(){
    $config['upload_path']='./uploads/blog/';
            $config['allowed_types']='jpg|png|jpeg';
            $this->load->library('upload',$config);
            $this->upload->do_upload();
            $data=  $this->upload->data();
            $post_by = $this->session->userdata('id_users');
            // echo print_r($post_by);  
            $gambar = $data['file_name'];
            $data=array(
                'post_title'    =>  $this->input->post('title'),
                'post_content'  =>  $this->input->post('content'),
                'post_image'    =>  $gambar,
                'post_status'   =>  $this->input->post('status'),
                'post_category' =>  $this->input->post('kategori'),
                'post_by'       =>  $post_by,
                'post_date'     =>  date('Y-m-d'),
                'post_slug'     =>  seo_title($this->input->post('title'))

     				);
            // echo print_r($data);
            $this->blog->simpan($data);
            $this->session->set_flashdata('info','Artikel Baru Berhasil Ditambahkan!');
            redirect('blog');
  }
  function edit($id){
        $data['title'] = 'Edit Artikel | Sistem Informasi Stunting';
        $data['blog']=$this->blog->all($id)->row();
        $this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('Blog/edit', $data);
    
        $this->load->view('templates/footer-datatables');

    }

    function processUpdate(){
      
          $config['upload_path']='./uploads/blog/';
        $config['allowed_types']='jpg|png|jpeg';
        $this->load->library('upload',$config);
        if($this->upload->do_upload('userfile') == NULL){ 
           $post_by = $this->session->userdata('id_users');
        // echo print_r($post_by);  
        $data=array(
            'post_title'    =>  $this->input->post('title'),
            'post_content'  =>  $this->input->post('content'),
            'post_status'   =>  $this->input->post('status'),
            'post_category' =>  $this->input->post('kategori'),
            'post_by'       =>  $post_by,
            'post_date'     =>  date('Y-m-d'),
            'post_slug'     =>  seo_title($this->input->post('title'))

             );
        // echo print_r($data);
        $this->blog->update($data,$this->input->post('id'));
        $this->session->set_flashdata('info','Artikel Berhasil Diubah!');
        redirect('blog');
        }else{
          $id = $this->input->post('id');
          $getdata = $this->blog->all($id)->row();
          unlink("uploads/blog/".$getdata->post_image);
          $this->upload->do_upload();
        $data=  $this->upload->data();
        $post_by = $this->session->userdata('id_users');
        // echo print_r($post_by);  
        $gambar = $data['file_name'];
        $data=array(
            'post_title'    =>  $this->input->post('title'),
            'post_content'  =>  $this->input->post('content'),
            'post_image'    =>  $gambar,
            'post_status'   =>  $this->input->post('status'),
            'post_category' =>  $this->input->post('kategori'),
            'post_by'       =>  $post_by,
            'post_date'     =>  date('Y-m-d'),
            'post_slug'     =>  seo_title($this->input->post('title'))

             );
        // echo print_r($data);
        $this->blog->update($data,$this->input->post('id'));
        $this->session->set_flashdata('info','Artikel Berhasil Diubah!');
        redirect('blog');
        }
    } 
    function delete($id){
        $getdata = $this->blog->all($id)->row();
        unlink("uploads/blog/".$getdata->post_image);
        $this->db->where('post_id',$id);
        $this->db->delete('tbl_post');
        $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Artikel berhasil dihapus!</div>');
        redirect('blog');
    }

}