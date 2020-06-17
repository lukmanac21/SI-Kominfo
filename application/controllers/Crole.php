<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crole extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Mmain');
        $this->load->library('session');
        $this->load->helper('main_helper');
    }
    public function index(){
        if ($this->session->userdata['logged_in'] == FALSE)
        {
            redirect(site_url("Clogin"));
        }
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data']= $this->Mmain->show_all_data('tbl_role');
        $this->load->view('Vrole', $data);
    }
    public function addRole(){
        $data['menu'] = $this->Mmain->show_all_data('tbl_menu');
        $this->load->view('Vroleadd', $data);
    }
    public function saveRole(){
        $nama_role      = $this->input->post('nama_role');

        $data = array(
            'nama_role'     => $nama_role,
        );

        $this->Mmain->save_data($data,'tbl_role');
        redirect('Crole/index');
    }
    public function hakAksesUser($id_role){
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data'] = $this->Mmain->show_all_data('tbl_menu');
        $data['role'] = $this->db->get_where('tbl_role',['id_role'=>$id_role])->row_array();
        $this->load->view('Vroleakses', $data);
    }

    public function changeaccess(){

        $id_menu = $this->input->post('menuId');
        $id_role = $this->input->post('roleId');

        $data = array(
            'id_menu' => $id_menu,
            'id_role' => $id_role
        );
        $result = $this->db->get_where('tbl_user_access',$data);
        var_dump($result);
        if($result->num_rows() < 1){
            $this->db->insert('tbl_user_access',$data);
        }else{
            $this->db->delete('tbl_user_access',$data);
        }
    }



    public function editUser($id_role){
        $where = array(
            'id_role' => $id_role
        );
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data'] = $this->Mmain->show_all_data_where('tbl_role',$where);
        $this->load->view('Vroleedit.php',$data);
    }
    public function updateRole(){
        $id_role = $this->input->post('id_role');
        $nama_role = $this->input->post('nama_role');
        $where = array(
            'id_role' => $id_role
        );
        $data  = array(
            'nama_role' => $nama_role
        );
        $this->Mmain->update_data($data,$where,'tbl_role');
        redirect('Crole/index');
    }
}