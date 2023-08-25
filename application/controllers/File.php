<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    cek_login();
	 	$this->load->model('files_model','files');
  }

  function index()
  {
    $data['query'] = $this->files->all();
		$this->load->view('admin/header',$data);
    $this->load->view('files/data',$data);
    $this->load->view('admin/footer');
  }

  public function create()
	{
		if(isset($_POST['save'])){
			      $config['upload_path']='./uploads/files/';
            $config['allowed_types']='*';
            $config['overwrite']=TRUE;
            $this->load->library('upload',$config);
            $this->upload->do_upload();
            $data=  $this->upload->data();
            //var_dump($data);
            $post_by = $this->session->userdata('iduser');
            $filename = $data['file_name'];
            $filetype = $data['file_type'];
            $filesize = $data['file_size'];
            $data=array(
                'file_title'      =>  $this->input->post('file_title'),
                'file_desc'       =>  $this->input->post('file_desc'),
                'file_name'       =>  $filename,
                'file_visibility' =>  $this->input->post('status'),
                'file_by'         =>  $post_by,
                'file_created'    =>  date('Y-m-d'),
                'file_size'       =>  $filesize,
                'file_type'       =>  $filetype,
     				);
            $this->files->simpan($data);
            $this->session->set_flashdata('info','File Baru Berhasil Ditambahkan!');
            redirect('file/create');
		}
		$this->load->view('admin/header');
    $this->load->view('files/create');
    $this->load->view('admin/footer');
	}

  function edit(){
      if(isset($_POST['save'])){
          $config['upload_path']='./uploads/files/';
          $config['allowed_types']='*';
          $config['overwrite']=TRUE;
          $this->load->library('upload',$config);
          $this->upload->do_upload();
          $data=  $this->upload->data();
          $post_by = $this->session->userdata('iduser');
          $filename = $data['file_name'];
          $filetype = $data['file_type'];
          $filesize = $data['file_size'];
          $id = $this->input->post('id');
          if($filename==null){
            $data=array(
                'file_title'      =>  $this->input->post('file_title'),
                'file_desc'       =>  $this->input->post('file_desc'),
                'file_visibility' =>  $this->input->post('status'),
                'file_by'         =>  $post_by,
                'file_created'    =>  date('Y-m-d')
     				);
          }
          else{
            $data=array(
                'file_title'      =>  $this->input->post('file_title'),
                'file_desc'       =>  $this->input->post('file_desc'),
                'file_name'       =>  $filename,
                'file_visibility' =>  $this->input->post('status'),
                'file_by'         =>  $post_by,
                'file_created'    =>  date('Y-m-d'),
                'file_size'       =>  $filesize,
                'file_type'       =>  $filetype,
     				);
          }
          $this->files->update($data,$id);
          $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> File berhasil diubah!</div>');
          redirect('file');
      }else{
          $id            = $this->uri->segment(3);
          $data['row']   = $this->db->get_where('tbl_files',array('file_id'=>$id))->row_array();
					$this->load->view('admin/header');
			    $this->load->view('files/edit',$data);
			    $this->load->view('admin/footer');
      }
  }

  function delete(){
      $this->db->where('file_id',$this->uri->segment(3));
      unlink("uploads/file".$post_image);
      $this->db->delete('tbl_files');
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
