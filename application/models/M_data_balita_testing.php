<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data_balita_testing extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function create($data_balita_testing)
    {
        return $this->db->insert_batch('data_balita_testing', $data_balita_testing);
    }
    public function read($data_id = -1)
    {
        $sql = "
            SELECT * from data_balita_testing
        ";
        if ($data_id != -1) {
            $sql .= "
                where data_id = '$data_id'
            ";
        }
        return $query = $this->db->query($sql)->result();
    }
    public function update($data_balita_testing, $data_balita_testing_param)
    {
        return  $this->db->update('data_balita_testing', $data_balita_testing, $data_balita_testing_param);
    }
    public function delete($data_balita_testing_param)
    {
        return $this->db->delete("data_balita_testing", $data_balita_testing_param);
    }
    public function count()
    {
        return $this->db->count_all("data_balita_testing");
    }

    public function get_min_max()
    {
        $sql = "
            SELECT * from data_balita_testing
        ";
        $query = $this->db->query($sql)->result();
        if (empty($query)) {
            return array();
        }
        return array(
            "min_data_tinggi_badan" => $this->db->query("SELECT tinggi_badan FROM data_balita_testing ORDER BY tinggi_badan ASC LIMIT 1")->result()[0]->tinggi_badan,
            "max_data_tinggi_badan" => $this->db->query("SELECT tinggi_badan FROM data_balita_testing ORDER BY tinggi_badan DESC LIMIT 1")->result()[0]->tinggi_badan,
            "min_data_berat_badan" => $this->db->query("SELECT berat_badan FROM data_balita_testing ORDER BY berat_badan ASC LIMIT 1")->result()[0]->berat_badan,
            "max_data_berat_badan" => $this->db->query("SELECT berat_badan FROM data_balita_testing ORDER BY berat_badan DESC LIMIT 1")->result()[0]->berat_badan,
            "min_data_lingkar_kepala" => $this->db->query("SELECT lingkar_kepala FROM data_balita_testing ORDER BY lingkar_kepala ASC LIMIT 1")->result()[0]->lingkar_kepala,
            "max_data_lingkar_kepala" => $this->db->query("SELECT lingkar_kepala FROM data_balita_testing ORDER BY lingkar_kepala DESC LIMIT 1")->result()[0]->lingkar_kepala,
        );
    }
}
