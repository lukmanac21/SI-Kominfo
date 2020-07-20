<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cpencairandana extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Mmain');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('main_helper');
    }
    public function index(){
        if ($this->session->userdata['logged_in'] == FALSE)
        {
            redirect(site_url("Clogin"));
        }
        $config['base_url'] = site_url('Cpencairandana/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_pencairandana'); //total row
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
        $data['data']= $this->Mmain->show_data_list('tbl_pencairandana',$config["per_page"], $data['page']);
        $this->load->view('Vpencairandana', $data);
    }
    public function addpencairandana(){
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $this->load->view('Vpencairandanaadd', $data);
    }
    public function savepencairandana(){
        $judul_pencairan = $this->input->post('judul_pencairan');
        $nosurat_pencairan = $this->input->post('nosurat_pencairan');
        $dari_pencairan = $this->input->post('dari_pencairan');
        $kepada_pencairan = $this->input->post('kepada_pencairan');
        $perihal_pencairan = $this->input->post('perihal_pencairan');
        $tgl_pencairan                  = $this->input->post('tgl_pencairan');

        $data = array(
            'judul_pencairan' => $judul_pencairan,
            'nosurat_pencairan' => $nosurat_pencairan,
            'dari_pencairan' => $dari_pencairan,
            'kepada_pencairan' => $kepada_pencairan,
            'perihal_pencairan' => $perihal_pencairan,
            'tgl_pencairan'        => $tgl_pencairan
        );
        $this->Mmain->save_data($data, 'tbl_pencairandana');
        redirect('Cpencairandana/index');
    }
    public function editpencairandana($id_pencairan){
        $where = [
            'id_pencairan' => $id_pencairan
        ];
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data']= $this->Mmain->show_all_data_where('tbl_pencairandana',$where);
        $this->load->view('vpencairandanaedit', $data);
    }
    public function updatepencairandana(){
        $id_pencairan = $this->input->post('id_pencairan');
        $judul_pencairan = $this->input->post('judul_pencairan');
        $nosurat_pencairan = $this->input->post('nosurat_pencairan');
        $dari_pencairan = $this->input->post('dari_pencairan');
        $kepada_pencairan = $this->input->post('kepada_pencairan');
        $perihal_pencairan = $this->input->post('perihal_pencairan');
        $tgl_pencairan                  = $this->input->post('tgl_pencairan');

        $data = array(
            'judul_pencairan' => $judul_pencairan,
            'nosurat_pencairan' => $nosurat_pencairan,
            'dari_pencairan' => $dari_pencairan,
            'kepada_pencairan' => $kepada_pencairan,
            'perihal_pencairan' => $perihal_pencairan,
            'tgl_pencairan'        => $tgl_pencairan
        );
        $where = array(
            'id_pencairan' => $id_pencairan
        );
        $this->Mmain->update_data($data,$where,'tbl_pencairandana');
        redirect('Cpencairandana/index');
    }
    public function adddetailpencairandana($id_pencairan){
        $where = array(
            'id_pencairan' => $id_pencairan
        );
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['header']=$this->Mmain->show_all_data_where('tbl_pencairandana',$where);
        $data['rekening']=$this->Mmain->show_all_data('tbl_rekening');
        $table= "tbl_detailpencairan";
        $tablejoin = "tbl_rekening";
        $joinwhere = "tbl_detailpencairan.id_rekening = tbl_rekening.id_rekening";
        $joinwhere2 = array(
            'tbl_detailpencairan.id_pencairan' => $id_pencairan
        );
        $data['detail'] = $this->Mmain->show_all_data_join_where($table,$tablejoin,$joinwhere,$joinwhere2);
        $this->load->view('Vdetailpencairandanaadd', $data);
    }
    public function saveDetailpencairandana(){
        $id_pencairan               = $this->input->post('id_pencairan');
        $id_rekening                = $this->input->post('id_rekening');
        $anggaran_dtlpncairan         = $this->input->post('anggaran_dtlpncairan');
        $resseb_dtlpncairan           = $this->input->post('resseb_dtlpncairan');
        $sisang_dtlpncairan           = $this->input->post('sisang_dtlpncairan');
        $pnjr_dtlpncairan             = $this->input->post('pnjr_dtlpncairan');


        $data = array(
            'id_pencairan'          => $id_pencairan,
            'id_rekening'           => $id_rekening,
            'anggaran_dtlpncairan'    => $anggaran_dtlpncairan,
            'resseb_dtlpncairan'      => $resseb_dtlpncairan,
            'sisang_dtlpncairan'      => $sisang_dtlpncairan,
            'pnjr_dtlpncairan'        => $pnjr_dtlpncairan
        );
        $this->Mmain->save_data($data, 'tbl_detailpencairan');
        redirect('Cpencairandana/adddetailpencairandana/'.$id_pencairan);

    }
    public function editDetailpencairandana($id_detail){
        $where = array (
            'id_detailpncairan' => $id_detail
        );
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['detail']=$this->Mmain->show_all_data_where('tbl_detailpencairan',$where);
        $data['rekening']=$this->Mmain->show_all_data('tbl_rekening');
        $this->load->view('Vdetailpencairandanaedit', $data);

    }
    public function updateDetailpencairandana(){
        $id_detailpncairan              = $this->input->post('id_detailpncairan');
        $id_pencairan                   = $this->input->post('id_pencairan');
        $id_rekening                    = $this->input->post('id_rekening');
        $anggaran_dtlpncairan           = $this->input->post('anggaran_dtlpncairan');
        $resseb_dtlpncairan             = $this->input->post('resseb_dtlpncairan');
        $sisang_dtlpncairan             = $this->input->post('sisang_dtlpncairan');
        $pnjr_dtlpncairan               = $this->input->post('pnjr_dtlpncairan');
        $where = array (
            'id_detailpncairan' => $id_detailpncairan 
        );
        $data = array(
            'id_pencairan'          => $id_pencairan,
            'id_rekening'           => $id_rekening,
            'anggaran_dtlpncairan'    => $anggaran_dtlpncairan,
            'resseb_dtlpncairan'      => $resseb_dtlpncairan,
            'sisang_dtlpncairan'      => $sisang_dtlpncairan,
            'pnjr_dtlpncairan'        => $pnjr_dtlpncairan

        );
        $this->Mmain->update_data($data,$where,'tbl_detailpencairan');
        redirect('Cpencairandana/adddetailpencairandana/'.$id_pencairan);
    }
    public function deleteDetailpencairan(){
        $id_pencairan                   = $this->input->post('id_pencairan');
        $id_detailpncairan              = $this->input->post('id_detailpncairan');
        $where = array(
            'id_detailpncairan' => $id_detailpncairan
        );
        $this->Mmain->delete_data('tbl_detailpencairan',$where);
        redirect('Cpencairandana/adddetailpencairandana/'.$id_pencairan);
    }
    public function cetak($id_pencairan){
        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
        $mpdf->setFont('Times New Roman','B',11);
        $data['header']= $this->Mmain->show_data_pencairan_header($id_pencairan);
        $data['data']= $this->Mmain->show_data_pencairan($id_pencairan);
        $html = $this->load->view('Vpencairanpdf',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
?>