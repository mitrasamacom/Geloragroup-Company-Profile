<?php
class Forms extends CI_Controller{
    function __construct(){
        parent::__construct();
        //cek session apakah sudah login, jika belum maka ke halaman login
        if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }
        // mengakses Forms_model
        $this->load->model('forms_model');
    }

    // fungsi untuk menampilkan halaman menu forms
    function index(){
        
      // menjalankan query show produk pada Forms_model
      $ambildata['data'] = $this->forms_model->show_produk();

      // cek session apakah user berlevel 1
      if($this->session->userdata('level')==='1'){
          $this->load->view('admin/header');
          $this->load->view('admin/forms', $ambildata); // mengambil data dari query show produk
          $this->load->view('admin/footer');
      }else{
          // jika user bukan berlevel 1 akan tampil
          echo "Access Denied";
      }
    }

    // fungsi untuk aksi menambahkan produk
    function Tambahproduk(){

        // menyimpan data dalam method post
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        // menjalankan query add_produk pada Forms_model
        $this->forms_model->add_produk();
        redirect('forms'); // menampilkan halaman pada fungsi forms
    }

    // fungsi untuk menjalankan aksi ubah produk
    function Ubahproduk(){
        
        // menyimpan data dalam method post
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        // menjalankan query change_produk pada Forms_model
        $this->forms_model->change_produk();
        redirect('forms'); // menampilkan halaman pada fungsi forms
    }

    // fungsi untuk menjalankan aksi hapus produk
    function Hapusproduk(){

        // menyimpan data dalam method post
        $id = $_POST['id'];

        // menjalankan query delete_produk pada Forms_model
        $this->forms_model->delete_produk();
        redirect('forms'); // menampilkan halaman pada fungsi forms
    }

    // fungsi untuk menjalankan aksi cetak laporan
    function Cetak(){

        // menjalankan query show_produk pada Forms_model
        $ambildata['data'] = $this->forms_model->show_produk();

        // cek session apakah user berlevel 1
        if($this->session->userdata('level')==='1'){
            $this->load->view('admin/cetak', $ambildata); // mengambil data dari query show_produk
        }else{
            // jika user bukan berlevel 1 akan tampil
            echo "Access Denied";
        }
    }

}