<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crekening extends CI_Controller{
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
        $config['base_url'] = site_url('Crekening/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_rekening'); //total row
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
    
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data'] = $this->Mmain->show_data_list('tbl_rekening',$config["per_page"], $data['page']);
        $this->load->view('Vrekening', $data);
    }
    public function addrekening(){
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $this->load->view('Vrekeningadd', $data);
    }
    public function saverekening(){
        $kode_rekening     = $this->input->post('kode_rekening');
        $uraian_rekening   = $this->input->post('uraian_rekening');


        $data = [
            'kode_rekening'   => $kode_rekening,
            'uraian_rekening'   => $uraian_rekening
        ];

        $query = $this->Mmain->save_data($data,'tbl_rekening');
        redirect('Crekening/index');
    }
    public function editrekening($id_rekening){
        $where = [
            'id_rekening' => $id_rekening
        ];
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data'] = $this->Mmain->show_all_data_where('tbl_rekening',$where);
        $this->load->view('Vrekeningedit.php',$data);
    }
    public function updaterekening(){
        $id_rekening = $this->input->post('id_rekening');
        $kode_rekening = $this->input->post('kode_rekening');
        $uraian_rekening = $this->input->post('uraian_rekening');

        $data = [
            'kode_rekening' => $kode_rekening,
            'uraian_rekening' => $uraian_rekening,
        ];
        $where = [
            'id_rekening' => $id_rekening
        ];

        $this->Mmain->update_data($data,$where,'tbl_rekening');
        redirect('Crekening/index');
    }
    public function getKoordinat(){
        $data['data'] = $this->Mmain->show_all_data('tbl_rekening');
        $this->load->view('Vcoordinat',$data);
    }
}
?>