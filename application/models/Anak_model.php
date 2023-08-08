<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anak_model extends CI_Model {

    public function getDataBalita()
    {
        $query = "SELECT * from penimbangan where namaBayi ='Dinda Kartika Sari'";
      
        return $this->db->query($query)->result_array();
    }
  
    public function dataLog($id)
    {
        $sql = "SELECT * FROM login_attempts WHERE user_id = '$id'";
        return $this->db->query($sql)->num_rows();
    }
}
