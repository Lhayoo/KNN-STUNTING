<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    // cek_login();
	 	$this->load->model('files_model','files');
  }

  function index()
  {
    $data['title'] = 'Data File | Sistem Informasi Stunting';
    $data['file'] = $this->files->all()->result_array();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('files/data', $data);
    
        $this->load->view('templates/footer-datatables');
  }

  public function create()
	{$data['title'] = 'Tambah File | Sistem Informasi Stunting';
    $data['file'] = $this->files->all()->result_array();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('files/add', $data);
    
        $this->load->view('templates/footer-datatables');
	}

  public function processAdd(){
     $config['upload_path']='./uploads/files/';
            $config['allowed_types']='*';
            $config['overwrite']=TRUE;
            $this->load->library('upload',$config);
            $this->upload->do_upload();
            $data=  $this->upload->data();
            //var_dump($data);
            $post_by = $this->session->userdata('id_users');
            $filename = $data['file_name'];
            $filetype = $data['file_type'];
            $filesize = $data['file_size'];
            $data=array(
                'file_title'      =>  $this->input->post('title'),
                'file_desc'       =>  $this->input->post('desc'),
                'file_name'       =>  $filename,
                'file_visibility' =>  $this->input->post('status'),
                'file_by'         =>  $post_by,
                'file_created'    =>  date('Y-m-d'),
                'file_size'       =>  $filesize,
                'file_type'       =>  $filetype,
            );
            $this->files->simpan($data);
            $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> File berhasil ditambahkan!</div>');
            redirect('file');
            
  }

  function edit($id){
    $data['title'] = 'Edit File | Sistem Informasi Stunting';
    $data['file'] = $this->files->all($id)->row();
		$this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('files/edit', $data);
    
        $this->load->view('templates/footer-datatables');
  }

  public function processUpdate(){
    $config['upload_path']='./uploads/files/';
            $config['allowed_types']='*';
            $config['overwrite']=TRUE;
            $this->load->library('upload',$config);
            $this->upload->do_upload();
            $data=  $this->upload->data();
            //var_dump($data);
            $post_by = $this->session->userdata('id_users');
            $filename = $data['file_name'];
            $filetype = $data['file_type'];
            $filesize = $data['file_size'];
            if($filename == null){
              $data=array(
                'file_title'      =>  $this->input->post('title'),
                'file_desc'       =>  $this->input->post('desc'),
                'file_visibility' =>  $this->input->post('status'),
                'file_by'         =>  $post_by,
                'file_created'    =>  date('Y-m-d'),
            );
          }else{
            $this->files->all($this->input->post('id'));
            unlink("uploads/files/".$this->input->post('file_name'));
            $data=array(
                'file_title'      =>  $this->input->post('title'),
                'file_desc'       =>  $this->input->post('desc'),
                'file_name'       =>  $filename,
                'file_visibility' =>  $this->input->post('status'),
                'file_by'         =>  $post_by,
                'file_created'    =>  date('Y-m-d'),
                'file_size'       =>  $filesize,
                'file_type'       =>  $filetype,
            );
          }
            $this->files->update($data,$this->input->post('id'));
            $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> File berhasil diupdate!</div>');
            redirect('file');
  }
  function delete($id){
    $file = $this->files->all($id)->row();
    unlink("uploads/files/".$file->file_name);
    $this->files->hapus($id);
      $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> File berhasil dihapus!</div>');
      redirect('file');
  }

  public function download()
  {
    $id = $this->uri->segment(3);
    $row = $this->files->find($id);
    $this->files->download_count($id);
    $this->load->helper('download');
    force_download("./uploads/files/" . $row->file_name, NULL);
  }

}