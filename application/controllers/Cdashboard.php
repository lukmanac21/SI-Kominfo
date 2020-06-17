<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cdashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Mmain');
        $this->load->library('session');
    }
    public function index(){
        if ($this->session->userdata['logged_in'] == FALSE)
        {
            redirect(site_url("Clogin"));
        }
        $role_id = $this->session->userdata('id_role');
        $data['user'] = $this->session->userdata('nama_user');        
        $id = $this->session->userdata('id');
        $data['profile']=$this->Mmain->load_data_profile($id);
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $this->load->view('Vdashboard',$data);
    }
}