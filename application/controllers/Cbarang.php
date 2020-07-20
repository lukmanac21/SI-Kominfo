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
        $tablejoin = 'tbl_jenis';
        $where = 'tbl_barang.id_jenis = tbl_jenis.id_jenis';
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['data']= $this->Mmain->show_all_data_join_list('tbl_barang',$tablejoin,$where,$config["per_page"], $data['page']);
        $this->load->view('Vbarang', $data);
    }
    public function addBarang(){
        $role_id = $this->session->userdata('id_role');
        $data['menu'] = $this->Mmain->show_menu_selected($role_id);
        $data['kegiatan'] = $this->Mmain->show_all_data('tbl_kegiatan');
        $data['satuan'] = $this->Mmain->show_all_data('tbl_satuan');
        $data['barang'] = $this->Mmain->show_all_data('tbl_barang');
        $data['jenis'] = $this->Mmain->show_all_data('tbl_jenis');
        $this->load->view('Vbarangadd', $data);
    }
    public function saveBarang(){
        $id_jenis                   = $this->input->post('id_jenis');
        $nama_barang                = $this->input->post('nama_barang');
        $id_kegiatan                = $this->input->post('id_kegiatan');
        $id_satuan                  = $this->input->post('id_satuan');
        $tgl_barang                 = $this->input->post('tgl_barang');
        $model_barang               = $this->input->post('model_barang');
        $fcc_barang                 = $this->input->post('fcc_barang');
        $upc_barang                 = $this->input->post('upc_barang');
        $hwversi_barang             = $this->input->post('hwversi_barang');
        $cmiit_barang               = $this->input->post('cmiit_barang');
        $kg_barang                  = $this->input->post('kg_barang');
        $produk_barang              = $this->input->post('produk_barang');
        $tipe_barang                = $this->input->post('tipe_barang');
        $plug_barang                = $this->input->post('plug_barang');
        $power_barang               = $this->input->post('power_barang');
        $frek_barang                = $this->input->post('frek_barang');
        $mac_barang                 = $this->input->post('mac_barang');
        $seri_barang                = $this->input->post('seri_barang');
        $stok_barang                = $this->input->post('stok_barang');
        $harga_barang               = $this->input->post('harga_barang');
        $product_img1               = $_FILES['pimages']['name'];

        $config['upload_path']      = './assets/img/barang/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = '10000';
        // $config['max_width']        = '1024';
        // $config['max_height']       = '768';

        $this->load->library('upload', $config);


        if ( ! $this->upload->do_upload('pimages')){
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $upload_data = $this->upload->data();
            $product_img1 = $upload_data['file_name'];

            $data = [
                'id_jenis'          => $id_jenis,
                'id_kegiatan'       => $id_kegiatan,
                'id_satuan'         => $id_satuan,
                'tgl_barang'        => $tgl_barang,        
                'nama_barang'       => $nama_barang,
                'model_barang'      => $model_barang,
                'fcc_barang'        => $fcc_barang,
                'upc_barang'        => $upc_barang,
                'hwversi_barang'    => $hwversi_barang,
                'cmiit_barang'      => $cmiit_barang,
                'kg_barang'         => $kg_barang,
                'produk_barang'     => $produk_barang,
                'type_barang'       => $tipe_barang,
                'plug_barang'       => $plug_barang,
                'power_barang'      => $power_barang,
                'frek_barang'       => $frek_barang,
                'mac_barang'        => $mac_barang,
                'seri_barang'       => $seri_barang,
                'stok_barang'       => $stok_barang,
                'harga_barang'      => $harga_barang,
                'img_barang'        => $product_img1
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
        $data['jenis'] = $this->Mmain->show_all_data('tbl_jenis');
        $data['data'] = $this->Mmain->show_all_data_where('tbl_barang',$where);
        $this->load->view('Vbarangedit.php',$data);
    }
    public function updateBarang(){
        $id_jenis                   = $this->input->post('id_jenis');
        $nama_barang                = $this->input->post('nama_barang');
        $id_kegiatan                = $this->input->post('id_kegiatan');
        $id_satuan                  = $this->input->post('id_satuan');
        $tgl_barang                 = $this->input->post('tgl_barang');
        $model_barang               = $this->input->post('model_barang');
        $fcc_barang                 = $this->input->post('fcc_barang');
        $upc_barang                 = $this->input->post('upc_barang');
        $hwversi_barang             = $this->input->post('hwversi_barang');
        $cmiit_barang               = $this->input->post('cmiit_barang');
        $kg_barang                  = $this->input->post('kg_barang');
        $produk_barang              = $this->input->post('produk_barang');
        $tipe_barang                = $this->input->post('tipe_barang');
        $plug_barang                = $this->input->post('plug_barang');
        $power_barang               = $this->input->post('power_barang');
        $frek_barang                = $this->input->post('frek_barang');
        $mac_barang                 = $this->input->post('mac_barang');
        $seri_barang                = $this->input->post('seri_barang');
        $stok_barang                = $this->input->post('stok_barang');
        $harga_barang               = $this->input->post('harga_barang');
        $product_img1               = $_FILES['pimages']['name'];
        $config['upload_path']      = './assets/img/barang/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = '10000';
        // $config['max_width']        = '1024';
        // $config['max_height']       = '768';
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('pimages')){
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $upload_data = $this->upload->data();
            $product_img1 = $upload_data['file_name'];
            $data  = [
                'id_jenis'          => $id_jenis,
                'id_kegiatan'       => $id_kegiatan,
                'id_satuan'         => $id_satuan,
                'tgl_barang'        => $tgl_barang,        
                'nama_barang'       => $nama_barang,
                'model_barang'      => $model_barang,
                'fcc_barang'        => $fcc_barang,
                'upc_barang'        => $upc_barang,
                'hwversi_barang'    => $hwversi_barang,
                'cmiit_barang'      => $cmiit_barang,
                'kg_barang'         => $kg_barang,
                'produk_barang'     => $produk_barang,
                'type_barang'       => $tipe_barang,
                'plug_barang'       => $plug_barang,
                'power_barang'      => $power_barang,
                'frek_barang'       => $frek_barang,
                'mac_barang'        => $mac_barang,
                'seri_barang'       => $seri_barang,
                'stok_barang'       => $stok_barang,
                'harga_barang'      => $harga_barang,
                'img_barang'        => $product_img1
            ];
            $where = array(
                'id_barang' => $id_barang
            );
             $this->Mmain->update_data($data,$where,'tbl_barang');
            //var_dump($data);
        }
        redirect('Cbarang/index');
    }
    public function printPdf(){
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHTMLFooter('
        <table width = "100%">
            <tr>
                <td style="text-align:left">{DATE -j-m-Y}</td>
                <td style="text-align:right">Halaman {PAGENO}/{nbpg}</td>
            </tr>
        </table>
        ');
        $data['data']= $this->Mmain->show_data_barang_excel();
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
        $object->getActiveSheet()->mergeCells('A1:S1')->setCellValue('A1','DATA ROUTER')->getColumnDimension('A')->setAutoSize(true);
        $object->getActiveSheet()->mergeCells('A2:S2')->setCellValue('A2','DISKOMINFO BONDOWOSO')->getColumnDimension('A')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('A3','No')->getColumnDimension('A')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('B3','JENIS BARANG')->getColumnDimension('B')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('C3','NAMA BARANG')->getColumnDimension('C')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('D3','KODE KEGIATAN')->getColumnDimension('D')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('E3','NAMA KEGIATAN')->getColumnDimension('E')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('F3','MODEL NO')->getColumnDimension('F')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('G3','UPC')->getColumnDimension('G')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('H3','H/W VERSI')->getColumnDimension('H')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('I3','CMIIT')->getColumnDimension('I')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('J3','TYPE')->getColumnDimension('J')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('K3','K/G')->getColumnDimension('K')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('L3','NAMA PRODUK')->getColumnDimension('L')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('M3','PLUG')->getColumnDimension('M')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('N3','POWER')->getColumnDimension('N')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('O3','FREKUENSI')->getColumnDimension('O')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('P3','SATUAN')->getColumnDimension('P')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('Q3','SERI BARANG')->getColumnDimension('Q')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('R3','MAC BARANG')->getColumnDimension('R')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('S3','OPD')->getColumnDimension('S')->setAutoSize(true);
        $object->getActiveSheet()->setCellValue('T3','KETERANGAN')->getColumnDimension('T')->setAutoSize(true);

        $baris = 4;
        $no = 1;
        
        foreach($data['data'] as $row){
            $object->getActiveSheet()->setCellValue('A'.$baris,$no++)->getColumnDimension('A')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('B'.$baris,$row->nama_jenis)->getColumnDimension('B')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('C'.$baris,$row->nama_barang)->getColumnDimension('C')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('D'.$baris,$row->kode_kegiatan)->getColumnDimension('D')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('E'.$baris,$row->nama_kegiatan)->getColumnDimension('E')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('F'.$baris,$row->model_barang)->getColumnDimension('F')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('G'.$baris,$row->upc_barang)->getColumnDimension('G')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('H'.$baris,$row->hwversi_barang)->getColumnDimension('H')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('I'.$baris,$row->cmiit_barang)->getColumnDimension('I')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('J'.$baris,$row->type_barang)->getColumnDimension('J')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('K'.$baris,$row->kg_barang)->getColumnDimension('K')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('L'.$baris,$row->produk_barang)->getColumnDimension('L')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('M'.$baris,$row->plug_barang)->getColumnDimension('M')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('N'.$baris,$row->power_barang)->getColumnDimension('N')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('O'.$baris,$row->frek_barang)->getColumnDimension('O')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('P'.$baris,$row->nama_satuan)->getColumnDimension('P')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('Q'.$baris,$row->seri_barang)->getColumnDimension('Q')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('R'.$baris,$row->mac_barang)->getColumnDimension('R')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('S'.$baris,get_status($row->id_barang))->getColumnDimension('S')->setAutoSize(true);
            $object->getActiveSheet()->setCellValue('T'.$baris,date('Y',strtotime($row->tgl_barang)))->getColumnDimension('T')->setAutoSize(true);
        
            $baris++;
        }
        $styleArrayHeader = array(
            'borders' => array(
                    'top' => array(
                            'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ),
                    'left' => array(
                        'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ),
                    'right' => array(
                        'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ),
                    'bottom' => array(
                        'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ),
            ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
        );
        $from = "A1"; // or any value
        $to = "S2"; // or any value
        $object->getDefaultStyle()->applyFromArray($styleArrayHeader);
        $object->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold( true );

        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        )
    );

        $filename = "Data_Barang".'.xlsx';
        $object->getDefaultStyle()->applyFromArray($styleArray);
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