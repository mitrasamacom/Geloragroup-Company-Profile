<?php
class Forms_model extends CI_Model{

  
  function show_produk(){
    $hasil = $this->db->query("SELECT * FROM tbl_produk");
    return $hasil;
  }

  function add_produk(){

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    $hasil = $this->db->query("INSERT INTO tbl_produk(nama, harga, jumlah)
    VALUES ('$nama','$harga','$jumlah')");

    return $hasil;
  }

  function change_produk(){

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    $hasil = $this->db->query("UPDATE tbl_produk SET nama='$nama', harga='$harga', jumlah='$jumlah' WHERE id='$id'");
    
    return $hasil;
  }

  function delete_produk(){

    $id = $_POST['id'];

    $hasil = $this->db->query("DELETE FROM tbl_produk WHERE id='$id'");

    return $hasil;
  }

}