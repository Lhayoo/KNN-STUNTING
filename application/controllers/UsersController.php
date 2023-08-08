<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModel');
    }
    public function index() {
        $data['title'] = 'Data User| Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $data['users'] = $this->UsersModel->getAll();
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-datatables', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('users/index', $data);
            $this->load->view('templates/footer-datatables');
           
       }
    }

    public function add() {
        $this->load->view('templates/header-datatables');
        $this->load->view('templates/sidebar');
        
        $this->load->view('users/input');
        $this->load->view('templates/footer-datatables');
    }
    public function processAdd() {
        $name= $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $tambah_data = array(
            'name' => $name,
            'username' => $username, 
            'password' => $password,
            'level_id' => $level,
            'is_active' => 1
        );

        $res = $this->UsersModel->addData($tambah_data);

        if ($res >= 1) {
            $this->session->set_flashdata('msg', 'Berhasil Ditambah');
            redirect('UsersController');
        }
    }

    public function edit($id) {
        $data['user'] = $this->UsersModel->getById($id);

        $this->load->view('templates/header-datatables');
        $this->load->view('templates/sidebar');
        $this->load->view('users/edit', $data);
        $this->load->view('templates/footer-datatables');
    }
    public function doUpdate() {
        $id= $_POST['id'];
        $name= $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        
            $update_data = array(
                'name' => $name,
                'username' => $username,
                'password' => $password,
                'level_id' => $level,
            );
            $where = array('id_users' => $id);
            $res = $this->UsersModel->UpdateData('user', $update_data, $where);
            if ($res >= 1) {
                $this->session->set_flashdata('msg', 'Berhasil Diupdate');
                redirect('UsersController');
            }
        }

        public function delete($id) {
            $where = array('id_users' => $id);
            $res = $this->UsersModel->HapusData('user', $where);

            $this->session->set_flashdata('msg', 'Berhasil Dihapus');

            if ($res >= 1) {
                redirect('UsersController');
            }
        }

}