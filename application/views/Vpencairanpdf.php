<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $this->load->view("_partials/head.php") ?>
<style>
            table.table-header, table-header.th, table-header.td{
            border-spacing: 0 10px;
            display: table;
            width: 100%;
            border-collapse: collapse;
            border: none;
            height: 50px;
            }
            table.table-content, table-content.th, table-content.td  {
                font-size: 13px;
                border: 1px solid black;
                padding: 5px;
                text-align: left;
            }
            @page {
                margin: 2cm 2cm;
            }

        </style>
    <body>

        <table class="table-header" cellspacing="0" cellpadding="0"  style="line-height:0.1px;" height="151px">
            <tr>
                <td width="20%" rowspan="6"><img height="120" width="auto" src="<?php echo base_url();?>assets/img/header/logoheader.jpg"/></td>
                <td style="text-align:center; font-size: 25px;">PEMERINTAH KABUPATEN BONDOWOSO</td>
            </tr>
            <tr>
            <td style="text-align:center; font-size: 22px; font-weight:bold;">DINAS KOMUNIKASI DAN INFORMATIKA</td>
            </tr>
            <tr>
            <td style="text-align:center; font-size: 12px;  margin-bottom:0px; padding-bottom:0px;">Jl. Letjen Panjaitan No. 234 Telp (0332) 421707</td>
            </tr>
            <tr>
            <td style="text-align:center; font-size: 12px;  margin-bottom:0px; padding-bottom:0px;">E-mail:admin@bondowosokab.go.id. Website:www.bondowosokab.go.id</td>
            </tr>
            <tr>
            <td style="text-align:center; font-size: 15px;  margin-bottom:0px; padding-bottom:0px;">B O N D O W O S O</td>
            </tr>
        </table>
        <hr style="height:2px;border-width:0;color:black;background-color:black padding:0px; margin:0px;">
    <div class="row">
   
        <?php foreach($header as $rowheader){?>
            <div class="row">
                <h4 style="text-align:center;  text-decoration: underline; font-weight:bold; margin-bottom:0px; padding-bottom:0px;"><?= $rowheader->judul_pencairan?></h4>
                <p style="text-align:center; padding-top:0px; margin-top:0px;"><?= $rowheader->nosurat_pencairan?></p>
            </div>
            <table cellspacing="0" cellpadding="0">
                <tbody>
                <tr><td style="font-size: 12.5px;">Dari</td><td style="font-size: 12.5px;"> &nbsp; :</td><td style="font-size: 12.5px;"> &nbsp; <?= $rowheader->dari_pencairan?></td></tr>
                <tr><td style="font-size: 12.5px;">Kepada</td><td style="font-size: 12.5px;"> &nbsp; :</td><td style="font-size: 12.5px;"> &nbsp; <?= $rowheader->kepada_pencairan?></td></tr>
                <tr><td style="font-size: 12.5px;">Perihal</td><td style="font-size: 12.5px;"> &nbsp; :</td><td style="font-size: 12.5px;"> &nbsp; <?= $rowheader->perihal_pencairan?></td></tr>
                </tbody>
            </table>
        <?php }?>
        <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th  style="text-align:center; width:30px; font-size: 12.5px; ">No</th>
                            <th  style="text-align:center; width:80px; font-size: 12.5px; ">Kode Rek</th>
                            <th  style="text-align:center; font-size: 12.5px;">Uraian</th> 
                            <th style="text-align:center; font-size: 12.5px;">Anggaran</th>
                            <th style="text-align:center; font-size: 12.5px;">Realisasi Sebelumnya</th>
                            <th style="text-align:center; font-size: 12.5px;">Sisa Anggaran</th>
                            <th style="text-align:center; font-size: 12.5px;">Panjar Yang Diminta</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php $numstart = 1;
                    $totalanggran = 0;
                    $totaleresseb = 0;
                    $totalsisang = 0;
                    $totalpnjr = 0; 
                    foreach ($data as $row) 
                    { 
                        $totalanggran = $totalanggran + $row->anggaran_dtlpncairan;
                        $totaleresseb = $totaleresseb + $row->resseb_dtlpncairan;
                        $totalsisang = $totalsisang + $row->sisang_dtlpncairan;
                        $totalpnjr = $totalpnjr + $row->pnjr_dtlpncairan;
                    ?>
                        <tr>
                            <td style="height: 35px; text-align:center; font-size: 12.5px;"><?php echo $numstart;?></td>
                            <td style="text-align:center; font-size: 12.5px;"><?php echo $row->kode_rekening; ?></td>
                            <td style="text-align:left; font-size: 12.5px;"><?php echo $row->uraian_rekening; ?></td>
                            <td style="text-align:right; font-size: 12.5px;"><?php echo "Rp. " . number_format($row->anggaran_dtlpncairan,0,".","."); ?></td>
                            <td style="text-align:right; font-size: 12.5px;"><?php echo "Rp. " . number_format($row->resseb_dtlpncairan,0,".","."); ?></td>
                            <td style="text-align:right; font-size: 12.5px;"><?php echo "Rp. " . number_format($row->sisang_dtlpncairan,0,".","."); ?></td>
                            <td style="text-align:right; font-size: 12.5px;"><?php echo "Rp. " . number_format($row->pnjr_dtlpncairan,0,".","."); ?></td>
                            <?php $numstart++; } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th></th>
                        <th></th>
                            <th style="height: 30px; text-align:center; font-size: 12.5px;">Total</th>
                            <td style="text-align:right; font-size: 12.5px;" colspan="1"><?php echo "Rp. " . number_format($totalanggran,0,".","."); ?></td>
                            <td style="text-align:right; font-size: 12.5px;" colspan="1"><?php echo "Rp. " . number_format($totaleresseb,0,".","."); ?></td>
                            <td style="text-align:right; font-size: 12.5px;" colspan="1"><?php echo "Rp. " . number_format($totalsisang,0,".","."); ?></td>
                            <td style="text-align:right; font-size: 12.5px;" colspan="1"><?php echo "Rp. " . number_format($totalpnjr,0,".","."); ?></td>
                        </tr>
                        <tr>
                        <td colspan="7" style="height: 30px; text-align:left; font-size: 12.5px;">Terbilang : <?= terbilang($totalpnjr) . "Rupiah";?></td>
                        </tr>
                    </tfoot>
                </table>
        </div>
            <?php foreach($header as $rowheader){?>
            <p style=" font-size: 12px; padding-top:0px; margin-top:0px; margin-bottom:0px; padding-bottom:0px;" >Pertanggungjawaban (SPJ) Terlampir,</p><p style="font-size: 12px; padding-top:0px; margin-top:0px; margin-bottom:0px; padding-bottom:0px;">Demikian untuk menjadikan periksa dan mohon keputusan <?= date('d-m-Y',strtotime($rowheader->tgl_pencairan));?></p>
            <br>	
                <table cellpadding="0" cellspacing="0" border="0"  style="font-size:12px; font-family: Arial; line-height: 17px;" width="670">
                    <tr>
                        <td valign="top" style="padding: 10px; margin-top:20px; text-align:center; padding-left: 40px" width="240">Disposisi,<br>
                        KEPALA KOMUNISKASI DAN INFORMATIKA<br>
                        KABUPATEN BONDOWOSO </td>
                        <br>

                        <td valign="top" style="padding: 10px; text-align:center;" width="250">
                            Bondowoso, <?= $rowheader->tgl_pencairan?><br>
                            P P T K<br/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" style="padding: 30px; margin-top:20px; text-align:center; padding-left: 100px" width="240"><br>
                        <td valign="top" style="padding: 30px;  margin-top:20px; text-align:center;" width="250"></td>
                    </tr>
                    <tr>
                        <td valign="top" style=" text-decoration: underline; font-weight:bold;  margin-bottom:0px; padding-bottom:0px; text-align:center; padding-left: 40px" width="240">HAERIAH YULIATI, S.Sos, M.M.<br>
                        <td valign="top" style="  text-decoration: underline; font-weight:bold;  margin-bottom:0px; padding-bottom:0px; text-align:center;  padding-left: 20px;" width="250">EKA KUSUMA ASTUTI, S.Kom.</td>
                    </tr>
                    <tr>
                        <td valign="top" style="margin-top:0px; text-align:center; padding-top:0px; padding-left: 40px" width="240">NIP. 19680910 19880 2 002<br>
                        <td valign="top" style="margin-top:0px; text-align:center; padding-top:0px; padding-left: 20px;" width="250">NIP. 19780517 200501 2 012</td>
                    </tr>
                </table>
            <?php } ?>
    </body>
</html>