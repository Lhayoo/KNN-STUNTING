<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Dashboard_model');
    }

    // MULAI MENAMPILKAN DASHBOARD PETUGAS
    public function petugas()
    {
        $data['title'] = 'Dashboard | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);
        $a = $this->Dashboard_model->dataBumil();
        $b = $this->Dashboard_model->dataBalita();
        $c = $this->Dashboard_model->dataLansia();
        $d = $this->Dashboard_model->dataPetugas();

        $id = $users['id_users'];
        $e = $this->Dashboard_model->dataLog($id);

        $data['count_bumil'] = $a;
        $data['count_balita'] = $b;
        $data['count_lansia'] = $c;
        $data['count_petugas'] = $d;
        $data['count_log'] = $e;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/petugas', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN DASHBOARD PETUGAS

    // MULAI MENAMPILKAN DASHBOARD IBU
    public function bidan()
    {
        $data['title'] = 'Dashboard | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);

        $a = $this->Dashboard_model->dataBumil();
        $b = $this->Dashboard_model->dataLansia();
        $c = $this->Dashboard_model->dataBidan();

        $id = $users['id_users'];
        $d = $this->Dashboard_model->dataLog($id);

        $data['count_bumil'] = $a;
        $data['count_lansia'] = $b;
        $data['count_bidan'] = $c;
        $data['count_log'] = $d;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-bidan');
        $this->load->view('templates/topbar-bidan', $data);
        $this->load->view('dashboard/bidan', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN DASHBOARD IBU
    // MULAI MENAMPILKAN DASHBOARD BUMIL
    public function bumil()
    {
        $data['title'] = 'Dashboard | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);

        $a = $this->Dashboard_model->dataBumil();

        $id = $users['id_users'];
        $d = $this->Dashboard_model->dataLog($id);

        $data['count_bumil'] = $a;
        $data['count_log'] = $d;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-bumil');
        $this->load->view('templates/topbar-bumil', $data);
        $this->load->view('dashboard/bumil', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN DASHBOARD IBU
    // MULAI MENAMPILKAN DASHBOARD LANSIA
    public function lansia()
    {
        $data['title'] = 'Dashboard | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);

        $a = $this->Dashboard_model->dataLansia();

        $id = $users['id_users'];
        $d = $this->Dashboard_model->dataLog($id);

        $data['count_lansia'] = $a;
        $data['count_log'] = $d;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-lansia');
        $this->load->view('templates/topbar-lansia', $data);
        $this->load->view('dashboard/lansia', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN DASHBOARD IBU
    // MULAI MENAMPILKAN DASHBOARD BALITA
    public function balita()
    {
        $data['title'] = 'Dashboard | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);

        $a = $this->Dashboard_model->dataBalita();

        $id = $users['id_users'];
        $d = $this->Dashboard_model->dataLog($id);

        $data['count_balita'] = $a;
        $data['count_log'] = $d;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-balita');
        $this->load->view('templates/topbar-balita', $data);
        $this->load->view('dashboard/balita', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN DASHBOARD IBU
    public function peserta()
    {
        $data['title'] = 'Dashboard | Sistem Informasi Stunting';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);

        $a = $this->Dashboard_model->dataLansia();

        $id = $users['id_users'];
        $d = $this->Dashboard_model->dataLog($id);

        $data['count_lansia'] = $a;
        $data['count_log'] = $d;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-pengguna');
        $this->load->view('templates/topbar-lansia', $data);
        $this->load->view('dashboard/lansia', $data);
        $this->load->view('templates/footer');
    }
    

}
