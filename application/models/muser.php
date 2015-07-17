<?php
class Muser extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function listall(){
        $query=$this->db->get("user");
        return $query->result_array();

    }
}