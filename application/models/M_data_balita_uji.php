<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data_balita_uji extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function create($data_balita_uji)
    {
        return $this->db->insert_batch('data_balita_uji', $data_balita_uji);
    }
    public function read($data_id = -1)
    {
        $sql = "
            SELECT * from data_balita_uji JOIN balita WHERE data_balita_uji.id_balita = balita.id 
        ";
        if ($data_id != -1) {
            $sql .= "
              AND data_id = '$data_id'
            ";
        }
        return $query = $this->db->query($sql)->result();
    }
    public function update($data_balita_uji, $data_balita_testing_param)
    {
        return  $this->db->update('data_balita_uji', $data_balita_uji, $data_balita_testing_param);
    }
    public function delete($data_balita_testing_param)
    {
        return $this->db->delete("data_balita_uji", $data_balita_testing_param);
    }
    public function count()
    {
        return $this->db->count_all("data_balita_uji");
    }

    public function get_min_max()
    {
        $sql = "
            SELECT * from data_balita_uji
        ";
        $query = $this->db->query($sql)->result();
        if (empty($query)) {
            return array();
        }
        return array(
            "min_data_bbu" => $this->db->query("SELECT bbu FROM data_balita_uji ORDER BY bbu ASC LIMIT 1")->result()[0]->bbu,
            "max_data_bbu" => $this->db->query("SELECT bbu FROM data_balita_uji ORDER BY bbu DESC LIMIT 1")->result()[0]->bbu,
            "min_data_tbu" => $this->db->query("SELECT tbu FROM data_balita_uji ORDER BY tbu ASC LIMIT 1")->result()[0]->tbu,
            "max_data_tbu" => $this->db->query("SELECT tbu FROM data_balita_uji ORDER BY tbu DESC LIMIT 1")->result()[0]->tbu,
            "min_data_bbtb" => $this->db->query("SELECT bbtb FROM data_balita_uji ORDER BY bbtb ASC LIMIT 1")->result()[0]->bbtb,
            "max_data_bbtb" => $this->db->query("SELECT bbtb FROM data_balita_uji ORDER BY bbtb DESC LIMIT 1")->result()[0]->bbtb,
        );
    }
}
