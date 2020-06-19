<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cuser extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Mmain');
        $this->load->library('session');
        $this->load->library('pagination');
    }
    public function index(){
        if ($this->session->userdata['logged_in'] == FALSE)
        {
            redirect(site_url("Clogin"));
        }
        $config['base_url'] = site_url('Cuser/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_user'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
        $data['pagination'] = $this->pagination->create_links();
        $where= 'tbl_user.id_role=tbl_role.id_role';
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data']= $this->Mmain->show_all_data_join_list('tbl_user','tbl_role',$where,$config["per_page"], $data['page']);
        $this->load->view('Vuser', $data);
    }
    public function addUser(){
        $role_id = $this->session->userdata('id_role');
        $data['role'] = $this->Mmain->show_all_data('tbl_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $this->load->view('Vuseradd', $data);
    }
    public function saveUser(){
        $nama_user      = $this->input->post('nama_user');
        $email_user        = $this->input->post('email_user');
        $password_user  = $this->input->post('password_user');
        $id_role        = $this->input->post('id_role');

        $data = array(
            'nama_user'     => $nama_user,
            'id_role'   => $id_role,
            'email_user' => $email_user,
            'password_user' => sha1($password_user)
        );

        $this->Mmain->save_data($data,'tbl_user');
        redirect('Cuser/index');
    }
    public function editUser($id_user){
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $where = [
            'id_user' => $id_user
        ];
        $data['role'] = $this->Mmain->show_all_data('tbl_role');
        $data['data']= $this->Mmain->show_all_data_where('tbl_user',$where);
        $this->load->view('Vuseredit', $data);
    }
    public function updateUser(){
        $nama_user      = $this->input->post('nama_user');
        $email_user        = $this->input->post('email_user');
        $password_user  = $this->input->post('password_user');
        $id_role        = $this->input->post('id_role');
        $id_user = $this->input->post('id_user');
        $where = array(
            'id_user' => $id_user
        );
        $data = array(
            'nama_user'     => $nama_user,
            'id_role'   => $id_role,
            'email_user' => $email_user,
            'password_user' => $password_user
        );
        $this->Mmain->update_data($data,$where,'tbl_user');
        redirect('Cuser/index');

    }
    public function hapusUser(){
        $id_user = $this->input->post('id_user');
        $where = array(
            'id_user' => $id_user
        );
        $this->Mmain->delete_data('tbl_user', $where);
        redirect('Cuser/index');
    }
}