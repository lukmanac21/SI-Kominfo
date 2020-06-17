<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clogin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Mmain');
        $this->load->library('session');
    }
    public function index(){
        $this->load->view('Vlogin');
    }
    public function login_action(){
        $email_user = $this->input->post('email_user');
        $password_user = $this->input->post('password_user');
        $where = array(
            'email_user' => $email_user,
            'password_user' => sha1($password_user)
        );
        $check = $this->Mmain->check_login("tbl_user",$where)->num_rows();
        if($check){

            $data = $this->Mmain->getLogindata("tbl_user",$where);
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('nama_user',$data['nama_user']);
            $this->session->set_userdata('id_role',$data['id_role']);

            redirect(site_url('Cdashboard'));
        }else{
            ?>
            <script type="text/javascript">alert("Email atau Password salah!");
            window.location.href = "http://localhost/SI-Kominfo/index.php/Clogin/index";
            </script>
            <?php
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url("Clogin"));
    }
}