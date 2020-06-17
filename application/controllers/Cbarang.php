<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cbarang extends CI_Controller {
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
        $config['base_url'] = site_url('Cbarang/index'); //site url
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
 

        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data']= $this->Mmain->show_data_list('tbl_barang',$config["per_page"], $data['page']);
        $this->load->view('Vbarang', $data);
    }
    public function addBarang(){
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['barang'] = $this->Mmain->show_all_data('tbl_barang');
        $this->load->view('Vbarangadd', $data);
    }
    public function saveBarang(){
        $now                        = date('Y-m-d');
        $tgl_barang                 = $now;
        $nama_barang                = $this->input->post('nama_barang');
        $mac_barang                 = $this->input->post('mac_barang');
        $seri_barang                = $this->input->post('seri_barang');
        $stok_barang                = $this->input->post('stok_barang');
        $product_img1               = $_FILES['pimages']['name'];
        $config['upload_path']      = './assets/img/barang/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = '100';
        $config['max_width']        = '1024';
        $config['max_height']       = '768';
        $this->load->library('upload', $config);

        $data = array(
            'tgl_barang'      => $tgl_barang,        
            'nama_barang'     => $nama_barang,
            'mac_barang'      => $mac_barang,
            'seri_barang'     => $seri_barang,
            'stok_barang'     => $stok_barang,
            'img_barang'      => $product_img1
        );
        if ( ! $this->upload->do_upload('pimages')){
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $upload_data = $this->upload->data();
            $product_img1 = $upload_data['file_name'];
        }

        $query = $this->Mmain->save_data($data,'tbl_barang');
        redirect('Cbarang/index');
    }
    public function editBarang($id_barang){
        $where = array(
            'id_barang' => $id_barang
        );
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data'] = $this->Mmain->show_all_data_where('tbl_barang',$where);
        $this->load->view('Vbarangedit.php',$data);
    }
    public function updateBarang(){
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $mac_barang = $this->input->post('mac_barang');
        $seri_barang = $this->input->post('seri_barang');
        $stok_barang = $this->input->post('stok_barang');
        $product_img1               = $_FILES['pimages']['name'];
        $config['upload_path']      = './assets/img/barang/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = '100';
        $config['max_width']        = '1024';
        $config['max_height']       = '768';
        $this->load->library('upload', $config);
        
        $where = array(
            'id_barang' => $id_barang
        );
        $data  = array(
            'nama_barang' => $nama_barang,
            'mac_barang'  => $mac_barang,
            'seri_barang' => $seri_barang,
            'stok_barang' => $stok_barang,
            'img_barang'      => $product_img1
        );
        if ( ! $this->upload->do_upload('pimages')){
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $upload_data = $this->upload->data();
            $product_img1 = $upload_data['file_name'];
        }
        $this->Mmain->update_data($data,$where,'tbl_barang');
        redirect('Cbarang/index');
    }
}