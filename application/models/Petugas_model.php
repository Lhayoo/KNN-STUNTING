<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model
{
    // MULAI CRUD DATA PETUGAS
    public function getDataPetugas()
    {
        $query = "SELECT petugas.*, user.username
                    From petugas JOIN user
                    ON petugas.user_id = user.id_users
                    ";

        return $this->db->query($query)->result_array();
    }

    public function delDataPetugas($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
    }

    public function updDataPetugas($id, $data)
    {
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
    }
    // SELESAI CRUD DATA PETUGAS
}
