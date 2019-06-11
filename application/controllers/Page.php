<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    //cek session apakah sudah login, jika belum maka ke halaman login
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  // ################################################### DASHBOARD admin [1] ##########################################
  function index(){
    //Ketika yang login adalah admin maka akan menampilkan folder view admin
    if($this->session->userdata('level')==='1'){
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }else{
        echo "Access Denied";
    }
  }
  // ################################################################################################################

  // ################################################### DASHBOARD MNG [2] ##########################################
  function loginmanager(){
    //Ketika yang login adalah manager maka akan menampilkan folder view MANAGER
    if($this->session->userdata('level')==='2'){
      $this->load->view('manager/header');
      $this->load->view('manager/dashboard');
      $this->load->view('manager/footer');
    }else{
        echo "Access Denied";
    }
  }
  // ################################################################################################################

  // ################################################### DASHBOARD ADM [3] ##########################################
  function loginadmin(){
    //Ketika yang login adalah admin maka akan menampilkan folder view ADMIN
    if($this->session->userdata('level')==='3'){
      $this->load->view('admin/header');
      $this->load->view('admin/dashboard');
      $this->load->view('admin/footer');
    }else{
        echo "Access Denied";
    }
  }
  // ################################################################################################################

  // ################################################### DASHBOARD SPV [4] ##########################################
  function loginsupervisor(){
    //Ketika yang login adalah admin maka akan menampilkan folder view ADMIN
    if($this->session->userdata('level')==='4'){
      $this->load->view('supervisor/header');
      $this->load->view('supervisor/dashboard');
      $this->load->view('supervisor/footer');
    }else{
        echo "Access Denied";
    }
  }
  // ################################################################################################################

  // ################################################### DASHBOARD OWN [5] ##########################################
  function loginowner(){
    //Ketika yang login adalah admin maka akan menampilkan folder view ADMIN
    if($this->session->userdata('level')==='5'){
      $this->load->view('owner/header');
      $this->load->view('owner/dashboard');
      $this->load->view('owner/footer');
    }else{
        echo "Access Denied";
    }
  }
  // ################################################################################################################

}