<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function __construct() {
      parent::__construct();
			$this->load->model('Frontend_model','front');
      $this->load->model('files_model','files');
  }

	public function index()
	{
			$data['title'] = 'STUNTING | Pages';
      $data['query'] = $this->files->allfront();
			$data['brpop'] = $this->front->brpopular();
      $data['content'] = 'frontend/download';
	   	$this->load->view('frontend/template',$data);
	}

  public function file()
  {
    $id = $this->uri->segment(3);
    $row = $this->files->find($id);
    $this->files->download_count($id);
    $this->load->helper('download');
    force_download("./uploads/files/" . $row->file_name, NULL);
  }

}

/* End of file P.php */
/* Location: ./application/controllers/P.php */