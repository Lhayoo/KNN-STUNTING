<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    // MULAI PROFILE USER PETUGAS
    public function profile()
    {
        $data['title'] = 'Profile | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        // $this->form_validation->set_rules('password1', 'New Password', 'trim|min_length[6]');
        // $this->form_validation->set_rules('password2', 'Repeat Password', 'min_length[6]|matches[passsword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-form', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer-form');
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $upload_image = $_FILES['image']['name'];
            $currpassword = $this->input->post('current-password');
            $newpassword = $this->input->post('new-password');
            $repeatpassword = $this->input->post('repeat-password');

            // if (isset($_POST['submit'])) {
            // var_dump($upload_image);
            // die;
            //     //OR
            //     // print_r($_FILES);
            // }
            // die;
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './build/img/profile';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'icon-user.png') {
                        unlink(FCPATH . 'build/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $pass = $data['user']['password'];

            if ($currpassword !== '') {
                if ($currpassword != $pass) {
                    $this->session->set_flashdata('psn', 'Current Password Salah!');
                } else {
                    if ($currpassword == $newpassword) {
                        $this->session->set_flashdata('psn', 'New Passord tidak bisa sama dengan Current Password!');
                    } else if ($newpassword != $repeatpassword) {
                        $this->session->set_flashdata('psn', 'New Password harus sama dengan Repeat Password!');
                    } else {
                        // $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                        $this->db->set('password', $newpassword);
                        // $this->db->set('image', $new_image);
                        $this->db->set('name', $name);
                        $this->db->where('username', $username);
                        $this->db->update('user');

                        $this->session->set_flashdata('msg', 'Data telah diubah');
                    }
                }
            } else {
                // $this->db->set('image', $new_image);
                $this->db->set('name', $name);
                $this->db->where('username', $username);
                $this->db->update('user');

                $this->session->set_flashdata('msg', 'Data telah diubah');
            }

            redirect('user/profile');
        }
    }
    // SELESAI PROFILE USER PETUGAS

    // MULAI PROFILE USER BIDAN
    public function profile_bidan()
    {
        $data['title'] = 'Profile | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        // $this->form_validation->set_rules('password1', 'New Password', 'trim|min_length[6]');
        // $this->form_validation->set_rules('password2', 'Repeat Password', 'min_length[6]|matches[passsword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header-form', $data);
            $this->load->view('templates/sidebar-bidan');
            $this->load->view('templates/topbar-bidan', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer-form');
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $upload_image = $_FILES['image']['name'];
            $currpassword = $this->input->post('current-password');
            $newpassword = $this->input->post('new-password');
            $repeatpassword = $this->input->post('repeat-password');

            // if (isset($_POST['submit'])) {
            // var_dump($upload_image);
            // die;
            //     //OR
            //     // print_r($_FILES);
            // }
            // die;
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './build/img/profile';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'icon-user.png') {
                        unlink(FCPATH . 'build/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $pass = $data['user']['password'];

            if ($currpassword !== '') {
                if ($currpassword != $pass) {
                    $this->session->set_flashdata('psn', 'Current Password Salah!');
                } else {
                    if ($currpassword == $newpassword) {
                        $this->session->set_flashdata('psn', 'New Passord tidak bisa sama dengan Current Password!');
                    } else if ($newpassword != $repeatpassword) {
                        $this->session->set_flashdata('psn', 'New Password harus sama dengan Repeat Password!');
                    } else {
                        // $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                        $this->db->set('password', $newpassword);
                        // $this->db->set('image', $new_image);
                        $this->db->set('name', $name);
                        $this->db->where('username', $username);
                        $this->db->update('user');

                        $this->session->set_flashdata('msg', 'Data telah diubah');
                    }
                }
            } else {
                // $this->db->set('image', $new_image);
                $this->db->set('name', $name);
                $this->db->where('username', $username);
                $this->db->update('user');

                $this->session->set_flashdata('msg', 'Data telah diubah');
            }

            redirect('user/profile');
        }
    }
    // SELESAI PROFILE USER BIDAN
}
