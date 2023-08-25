<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Album extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
	 	$this->load->model('Album_model','album');
    $this->load->model('Frontend_model','front');
  }

  function index()
  {
    $data['title'] = 'Data Album | Sistem Informasi Stunting';
    $data['album'] = $this->album->all()->result_array();
    $this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('album/data', $data);
    
        $this->load->view('templates/footer-datatables');
  }

  public function create()
	{
   
    $data['title'] = 'Tambah Album | Sistem Informasi Stunting';
    $data['album'] = $this->album->all()->result_array();
    $this->load->view('templates/header-datatables', $data);
		$this->load->view('templates/sidebar');
        $this->load->view('album/add', $data);
    
        $this->load->view('templates/footer-datatables'); 
	}

  function processAdd(){
        $config['upload_path']='./uploads/album/';
        $config['allowed_types']='jpg|png|jpeg';
        $this->load->library('upload',$config);
        $this->upload->do_upload();
        $data=  $this->upload->data();
        $data = [
                  'album_name'      =>  $this->input->post('title'),
                  'album_desc'      =>  $this->input->post('desc'),
                  'album_thumbnail' =>  $data['file_name'],
                  'album_status'    =>  $this->input->post('status'),
                  'album_create'    =>  date('Y-m-d'),
                  'album_slug'      =>  seo_title($this->input->post('title'))
        ];
        $this->album->simpan($data);
        $this->session->set_flashdata('info','Album Baru Berhasil Ditambahkan!');
        redirect('album');
  }
  function edit(){
      $id = $this->uri->segment(3);
      $data['title'] = 'Edit Album | Sistem Informasi Stunting';
      $data['album'] = $this->album->all($id)->row();
      $this->load->view('templates/header-datatables', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('album/edit', $data);
      $this->load->view('templates/footer-datatables');
    }

    function processUpdate(){
      $id = $this->input->post('id');
      $config['upload_path']='./uploads/album/';
      $config['allowed_types']='jpg|png|jpeg';
      $this->load->library('upload',$config);
      $this->upload->do_upload();
      $data=  $this->upload->data();
      if($data['file_name'] != ''){
        $data = [
                  'album_name'      =>  $this->input->post('title'),
                  'album_desc'      =>  $this->input->post('desc'),
                  'album_thumbnail' =>  $data['file_name'],
                  'album_status'    =>  $this->input->post('status'),
                  'album_create'    =>  date('Y-m-d'),
                  'album_slug'      =>  seo_title($this->input->post('title'))
        ];
      }else{
        $data = [
                  'album_name'      =>  $this->input->post('title'),
                  'album_desc'      =>  $this->input->post('desc'),
                  'album_status'    =>  $this->input->post('status'),
                  'album_create'    =>  date('Y-m-d'),
                  'album_slug'      =>  seo_title($this->input->post('title'))
        ];
      }
      $this->album->update($data,$id);
      $this->session->set_flashdata('info','Album Berhasil Diubah!');
      redirect('album');
    }

    function upload_photo()
    {
      cek_login();
      if(isset($_POST['save'])){

        $config = array();
        $config['upload_path'] = './uploads/album/photos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite']     = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['max_size'] = 0;

        $numberfile = count($files['userfile']['name']);
        $this->load->library('upload');
        $files = $_FILES;
        for($i=0; $i< count($files['userfile']['name']); $i++)
        {
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];

            $this->upload->initialize($config);
            $this->upload->do_upload('userfile');

            $data = array(
                  'album_id'    			=> $this->input->post('id'),
                  'photo_name'    	  => $files['userfile']['name'][$i],
                  'photos_create'    	=> date('Y-m-d')
            );

            $message_data[] = $data;
        }
        //var_dump($data);
        $this->album->insert_photo($message_data);
        $this->session->set_flashdata('info','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.count($files['userfile']['name']).' Foto berhasil diupload!</div>');
        redirect('album');
      }else{
          $id            = $this->uri->segment(3);
          $data['row']   = $this->db->get_where('tbl_album',array('album_id'=>$id))->row_array();
          $this->load->view('admin/header');
          $this->load->view('album/upload_photo',$data);
          $this->load->view('admin/footer');
      }
    }

    function delete($id){
          $data = $this->album->all($id)->row();
          $path = './uploads/album/';
        unlink($path.$data->album_thumbnail);
        $this->album->delete($id);
        redirect('album');
    }

    function view_photo()
    {
      $id            = $this->uri->segment(3);
      $this->db->join('tbl_album', 'tbl_album.album_id = tbl_photos.album_id');
      $data['row'] = $this->db->get_where('tbl_photos',array('tbl_photos.album_id'=>$id))->row_array();
      $data['pages'] = $this->db->get_where('tbl_photos',array('tbl_photos.album_id'=>$id))->result_array();
      $data['brpop'] = $this->front->brpopular();
      $data['title'] = 'SIGAP | Album';
      $data['content'] = 'frontend/view_photo';
	   	$this->load->view('frontend/template',$data);
    }

    function view_album()
    {
      $data['query'] = $this->album->all();
      $data['brpop'] = $this->front->brpopular();
      $data['title'] = 'SIGAP | Album';
      $data['content'] = 'frontend/view_album';
	   	$this->load->view('frontend/template',$data);
    }

    function view_video()
    {
      $data['video'] = $this->front->video();
      $data['brpop'] = $this->front->brpopular();
      $data['title'] = 'SIGAP | Album Video';
      $data['content'] = 'frontend/view_video';
	   	$this->load->view('frontend/template',$data);
    }

}