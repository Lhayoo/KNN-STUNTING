<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi_model extends CI_Model
{

    // MULAI KONTEN CARD
    public function dataIbu()
    {
        $res = $this->db->count_all_results('ibu');
        return $res;
    }

    public function dataAnak()
    {
        $res = $this->db->count_all_results('anak');
        return $res;
    }

    public function dataPetugas()
    {
        $res = $this->db->count_all_results('petugas');
        return $res;
    }

    public function dataBidan()
    {
        $res = $this->db->count_all_results('bidan');
        return $res;
    }

    public function dataLog($id)
    {
        $sql = "SELECT * FROM login_attempts WHERE user_id = '$id'";
        return $this->db->query($sql)->num_rows();
    }
    // SELESAI KONTEN CARD
}
