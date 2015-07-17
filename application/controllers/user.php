<?php
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

  public function index(){
      $this->load->Model("Muser");
      $data=$this->Muser->listall();
      $this->load->view("index",$data[0]);

  }

}