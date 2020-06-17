<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Csubmenu extends CI_Controller {
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
        $config['base_url'] = site_url('Csubmenu/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_barang'); //total row
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
        $where = 'tbl_sub_menu.id_menu = tbl_menu.id_menu';
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data'] = $this->Mmain->show_all_data_join_list('tbl_sub_menu','tbl_menu',$where,$config["per_page"], $data['page']);
        $this->load->view('Vsubmenu', $data);
    }
    public function addSubmenu(){
        $where = 'tbl_sub_menu.id_menu = tbl_menu.id_menu';
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['select'] = $this->Mmain->show_all_data('tbl_menu');
        $data['data'] = $this->Mmain->show_all_data_join('tbl_sub_menu','tbl_menu',$where);
        $this->load->view('Vsubmenuadd', $data);
    }
    public function saveSubmenu(){
        $id_menu = $this->input->post('id_menu');
        $nama_sub_menu = $this->input->post('nama_sub_menu');
        $icon_sub_menu = $this->input->post('icon_sub_menu');
        $link_menu  = $this->input->post('link_menu');
        $data = array(
            'id_menu' => $id_menu,
            'nama_sub_menu' => $nama_sub_menu,
            'icon_sub_menu' => $icon_sub_menu,
            'link_menu' => $link_menu
        );
        $this->Mmain->save_data($data, 'tbl_sub_menu');
        redirect('Csubmenu/index');
    }
    public function editSubmenu($id_sub_menu){
        $where = [
            'id_sub_menu' => $id_sub_menu
        ];
        $wherejoin = 'tbl_sub_menu.id_menu = tbl_menu.id_menu';
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['select'] = $this->Mmain->show_all_data('tbl_menu');
        $data['data'] = $this->Mmain->show_all_data_join_where('tbl_sub_menu','tbl_menu',$wherejoin, $where);
        $this->load->view('Vsubmenuedit', $data);
    }
    public function updateSubmenu(){
        $id_sub_menu = $this->input->post('id_sub_menu');
        $id_menu = $this->input->post('id_menu');
        $nama_sub_menu = $this->input->post('nama_sub_menu');
        $icon_sub_menu = $this->input->post('icon_sub_menu');
        $link_menu = $this->input->post('link_menu');

        $where = array (
            'id_sub_menu' => $id_sub_menu
        );
        $data = array (
            'id_menu' => $id_menu,
            'nama_sub_menu' => $nama_sub_menu,
            'nama_sub_menu' => $nama_sub_menu,
            'link_menu' => $link_menu
        );
        $this->Mmain->update_data($data,$where,'tbl_sub_menu');
        redirect('Csubmenu/index');
    }
    public function deleteSubmenu(){
        $id_sub_menu = $this->input->post('id_sub_menu');
        $where = array(
            'id_sub_menu' => $id_sub_menu
        );
        $this->Mmain->delete_data('tbl_sub_menu',$where);
        redirect('Csubmenu/index');
    }
}