<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cbarang extends CI_Controller {
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
        $data['kegiatan'] = $this->Mmain->show_all_data('tbl_kegiatan');
        $data['satuan'] = $this->Mmain->show_all_data('tbl_satuan');
        $data['barang'] = $this->Mmain->show_all_data('tbl_barang');
        $this->load->view('Vbarangadd', $data);
    }
    public function saveBarang(){
        $id_kegiatan                = $this->input->post('id_kegiatan');
        $id_satuan                  = $this->input->post('id_satuan');
        $tgl_barang                 = $this->input->post('tgl_barang');
        $nama_barang                = $this->input->post('nama_barang');
        $mac_barang                 = $this->input->post('mac_barang');
        $seri_barang                = $this->input->post('seri_barang');
        $stok_barang                = $this->input->post('stok_barang');
        $harga_barang                 = $this->input->post('harga_barang');
        $product_img1               = $_FILES['pimages']['name'];

        $config['upload_path']      = './assets/img/barang/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = '10000';
        $config['max_width']        = '1024';
        $config['max_height']       = '768';

        $this->load->library('upload', $config);


        if ( ! $this->upload->do_upload('pimages')){
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $upload_data = $this->upload->data();
            $product_img1 = $upload_data['file_name'];

            $data = [
                'id_kegiatan'     => $id_kegiatan,
                'id_satuan'       => $id_satuan,
                'tgl_barang'      => $tgl_barang,        
                'nama_barang'     => $nama_barang,
                'mac_barang'      => $mac_barang,
                'seri_barang'     => $seri_barang,
                'stok_barang'     => $stok_barang,
                'harga_barang'    => $harga_barang,
                'img_barang'      => $product_img1
            ];
            $this->Mmain->save_data($data,'tbl_barang');
        }
        redirect('Cbarang/index');
    }
    public function editBarang($id_barang){
        $where = array(
            'id_barang' => $id_barang
        );
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['kegiatan'] = $this->Mmain->show_all_data('tbl_kegiatan');
        $data['satuan'] = $this->Mmain->show_all_data('tbl_satuan');
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
        if ( ! $this->upload->do_upload('pimages')){
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $upload_data = $this->upload->data();
            $product_img1 = $upload_data['file_name'];
            $data  = [
                'nama_barang' => $nama_barang,
                'mac_barang'  => $mac_barang,
                'seri_barang' => $seri_barang,
                'stok_barang' => $stok_barang,
                'img_barang'  => $product_img1
            ];
            $this->Mmain->update_data($data,$where,'tbl_barang');
        }
        redirect('Cbarang/index');
    }
    public function printPdf(){
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHTMLHeader('
        <p style="text-align:center">Dinas Komunikasi dan Informatika Bondowoso <br> Jalan Panjaitan 56 Bondowoso</p>
        
        ');
        $mpdf->SetHTMLFooter('
        <table width = "100%">
            <tr>
                <td style="text-align:left">{DATE -j-m-Y}</td>
                <td style="text-align:right">Halaman {PAGENO}/{nbpg}</td>
            </tr>
        </table>
        ');
        $data['data']= $this->Mmain->show_all_data('tbl_barang');
        $html = $this->load->view('Vbarangpdf',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    public function printExcel(){

        
        $data['data']= $this->Mmain->show_data_barang_excel();
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();
        $object->getProperties()->setCreator("DISKOMINFO BONDOWOSO");
        $object->getProperties()->setTitle("Data Barang");
        $object->setActiveSheetIndex(0);
        $object->getActiveSheet()->setCellValue('A1','No')->getColumnDimension('A')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('B1','NAMA BARANG')->getColumnDimension('B')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('C1','KODE KEGIATAN')->getColumnDimension('C')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('D1','NAMA KEGIATAN')->getColumnDimension('D')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('E1','SATUAN')->getColumnDimension('E')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('F1','SERI BARANG')->getColumnDimension('F')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('G1','MAC BARANG')->getColumnDimension('G')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('H1','LOKASI BARANG')->getColumnDimension('H')->setAutoSize(true);

        $baris = 2;
        $no = 1;
        
        foreach($data['data'] as $row){
            $object->getActiveSheet()->setCellValue('A'.$baris,$no++)->getColumnDimension('A')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('B'.$baris,$row->nama_barang)->getColumnDimension('B')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('C'.$baris,$row->kode_kegiatan)->getColumnDimension('C')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('D'.$baris,$row->nama_kegiatan)->getColumnDimension('D')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('E'.$baris,$row->nama_satuan)->getColumnDimension('E')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('F'.$baris,$row->seri_barang)->getColumnDimension('F')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('G'.$baris,$row->mac_barang)->getColumnDimension('G')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('H'.$baris,get_status($row->id_barang))->getColumnDimension('H')->setAutoSize(true);
        
            $baris++;
        }
        $from = "A1"; // or any value
        $to = "H1"; // or any value
        $object->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold( true );


    //     $styleArray = array(
    //         'font' => array(
    //                 'bold' => true,
    //         ),
    //         'alignment' => array(
    //                 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //                 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    //         ),
    //         'borders' => array(
    //                 'top' => array(
    //                         'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                 ),
    //                 'left' => array(
    //                     'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                 ),
    //                 'right' => array(
    //                     'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                 ),
    //                 'bottom' => array(
    //                     'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //             ),
    //         ),
    //         'fill' => array(
    //                 'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
    //                 'rotation' => 90,
    //                 'startcolor' => array(
    //                         'argb' => 'FFA0A0A0',
    //                 ),
    //                 'endcolor' => array(
    //                         'argb' => 'FFFFFFFF',
    //                 ),
    //         ),
    // );
    $styleArray = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );

    // foreach(range('A','I') as $columnID) {
    //     $object->getActiveSheet()->getStyle('A1:H2')->applyFromArray($styleArray);
    // }

        $filename = "Data_Barang".'.xlsx';
        $object->getActiveSheet()->setTitle("Data Barang");
        $object->getActiveSheet()->calculateColumnWidths();

        header('Content-Type: application/vnd.openxmlformats-officedocument.speadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($object,'Excel2007');
        $writer->save('php://output');
        
        exit;

    }
   

}