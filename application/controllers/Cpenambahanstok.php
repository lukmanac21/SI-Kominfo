<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cpenambahanstok extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Mmain');
        $this->load->library('session');
        $this->load->helper('date');
        $this->load->library('pagination');
    }
    public function index(){
        if ($this->session->userdata['logged_in'] == FALSE)
        {
            redirect(site_url("Clogin"));
        }
        $config['base_url'] = site_url('Cpenambahanstok/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_pnmbhnstkbrg'); //total row
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
        $where              = 'tbl_pnmbhnstkbrg.id_barang = tbl_barang.id_barang';
        $role_id            = $this->session->userdata('id_role');
        $data['menu']       = $this->Mmain->show_menu_selected($role_id);
        $data['data']       = $this->Mmain->show_all_data_join('tbl_pnmbhnstkbrg','tbl_barang',$where,$config["per_page"], $data['page']);
        
        
        $this->load->view('Vpnmbhanstok', $data);
    }
    public function addStok(){
        $role_id            = $this->session->userdata('id_role');
        $data['menu']       = $this->Mmain->show_menu_selected($role_id);
        $data['brg']        = $this->Mmain->show_all_data('tbl_barang');


        $this->load->view('Vpnmbhnstkadd', $data);
    }
    public function saveStok(){
        $now                = date('Y-m-d');
        $role_id            = $this->session->userdata('id_role');
        $tgl_pnmbhnstkbrg   = $now;
        $id_barang        = $this->input->post('id_barang');
        $jumlah_barang      = $this->input->post('jumlah_barang');

        $data = array(
            'tgl_pnmbhnstkbrg'     => $tgl_pnmbhnstkbrg,
            'id_barang'            => $id_barang,
            'jumlah_barang'        => $jumlah_barang
        );

        $this->Mmain->save_data($data,'tbl_pnmbhnstkbrg');
        redirect('Cpenambahanstok/index');
    }
    public function hapusPnmbhn(){
        $id_pnmbhnstkbrg      = $this->input->post('id_pnmbhnstkbrg');
        $where                = array(
            'id_pnmbhnstkbrg' => $id_pnmbhnstkbrg
        );
        $this->Mmain->delete_data('tbl_pnmbhnstkbrg',$where);
        redirect('Cpenambahanstok/index');
    }
}