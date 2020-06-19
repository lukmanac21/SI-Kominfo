<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{
    public function index(){

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHTMLFooter('
        <table width = "100%">
            <tr>
                <td width="33%">{DATE -j-m-Y}</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align:right;">DISKOMINFO BONDOWOSO</td>
            </tr>
        </table>
        ');
        $html = $this->load->view('welcome_messsage',[],true);
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();


    }
}

?>