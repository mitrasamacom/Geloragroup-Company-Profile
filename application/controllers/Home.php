<?php
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        // mengakses Forms_model
        $this->load->model('forms_model');
    }

    // fungsi untuk menampilkan halaman menu forms
    function index(){
      $this->load->view('home/header');
      $this->load->view('home/body');
      $this->load->view('home/footer');
    }

}