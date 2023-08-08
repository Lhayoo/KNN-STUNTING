<?php

class Core_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}


class Knn_Controller extends Core_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (
            $this->session->userdata('user_level') != 1
        ) {
            redirect(site_url('/user/login'));
        }
    }
}
