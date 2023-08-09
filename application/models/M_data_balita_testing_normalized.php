<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_data_balita_testing_normalized extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function create($data_balita_testing)
    {
        return $this->db->insert_batch('data_balita_testing_normalized', $data_balita_testing);
    }
    public function read($data_id = -1, $mode = "object")
    {
        $sql = "
             SELECT * from data_balita_testing_normalized JOIN balita WHERE data_balita_testing_normalized.id_balita = balita.id
        ";
        if ($data_id != -1) {
            $sql .= "
                where data_id = '$data_id'
            ";
        }
        if ($mode == "array")
            return $query = $this->db->query($sql)->result_array();
        else
            return $query = $this->db->query($sql)->result();
    }
    public function update($data_balita_testing, $data_balita_testing_param)
    {
        return  $this->db->update('data_balita_testing_normalized', $data_balita_testing, $data_balita_testing_param);
    }
    public function delete($data_balita_testing_param)
    {
        return $this->db->delete("data_balita_testing_normalized", $data_balita_testing_param);
    }
    public function clear()
    {
        return $query = $this->db->query("TRUNCATE data_balita_testing_normalized ");
    }
}
