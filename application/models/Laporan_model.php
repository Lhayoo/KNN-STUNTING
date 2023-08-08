<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function view(){
        return $this->db->get('balita')->result();
      }
      
      public function view_row(){
        return $this->db->get('balita')->result();
      }
    }
