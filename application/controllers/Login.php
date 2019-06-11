<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    //menjalankan model login, untuk menampilkan database
    $this->load->model('login_model');
  }
  //ketika sistem di akses akan menampilkan tampilan view login
  function index(){
    if($this->session->userdata('logged_in') !== TRUE){ //jika gagal login
      $this->load->view('login_view');
      //$this->load->view('admin/footer');
    }else{ //jika berhasil login
      if($this->session->userdata('level')==='1'){ //ketika admin berhasil login
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
      }else if($this->session->userdata('level')==='2'){ //ketika manager berhasil login
        $this->load->view('manager/header');
        $this->load->view('manager/dashboard');
        $this->load->view('manager/footer');
      }else{ //ketika admin berhasil login
        echo "Access Denied";
      }
    }
  }

  //ketika melakukan login akan dicek
  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['nama'];
        $email = $data['user_name'];
        $level = $data['user_level'];
        $kd_divisi = $data['kd_divisi'];
        $sesdata = array(
            'username'  => $name,
            'email'     => $email,
            'level'     => $level,
            'kd_divisi' => $kd_divisi,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // jika yang login admin
        if($level === '1'){
            redirect('page');

        // jika yang login manager
        }elseif($level === '2'){
            redirect('page/loginmanager');

        // jika yang login admin
        }elseif($level === '3'){
          redirect('page/loginadmin');

      // jika yang login admin
        }elseif($level === '4'){
          redirect('page/loginsupervisor');

      // jika yang login admin
        }else{
            redirect('page/loginowner');
        }
    }else{ //jika user pass salah maka akan muncul notif
        echo $this->session->set_flashdata('msg','Username atau Password Salah');
        redirect('login');
    }
  }

  //funcsi untuk logout ketika klik link logout
  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

}