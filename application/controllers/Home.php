<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
      parent::__construct();
      $this->load->model('Slider_model','slide');
			$this->load->model('Frontend_model','front');
  }

	public function index()
	{
		$data['title'] = 'SIGAP | SIG NARKOBA POLRES PEKALONGAN KOTA';
		$data['query'] = $this->slide->all();
		$data['newest'] = $this->front->newest();
		$data['brkotas'] = $this->front->kotas();
		$data['brkota'] = $this->front->kota();
		$data['brlains'] = $this->front->lains();
		$data['brlain'] = $this->front->lain();
		$data['brpop'] = $this->front->brpopular();
		$data['album'] = $this->front->album();
		$data['video'] = $this->front->video();
		//$data['content'] = 'publik/main';
		$data['content'] = 'frontend/home';
		$this->load->view('frontend/template',$data);
	}


}