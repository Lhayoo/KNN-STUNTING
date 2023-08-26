<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller {

	public function __construct() {
      parent::__construct();
			$this->load->model('Frontend_model','front');
  }

	public function detail()
	{
			$data['title'] = 'SIGAP | Pages';
	   	$seo =  $this->uri->segment(2);
      $data['pages'] = $this->db->get_where('tbl_menu',array('menu_seo'=>$seo))->row_array();
			$data['brpop'] = $this->front->brpopular();
      $data['content'] = 'frontend/pages';
	   	$this->load->view('frontend/template',$data);
	}

}

/* End of file P.php */
/* Location: ./application/controllers/P.php */
