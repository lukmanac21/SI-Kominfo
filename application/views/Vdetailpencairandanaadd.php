<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $this->load->view("_partials/head.php") ?>

<body>
    <div id="wrapper">
	<?php $this->load->view("_partials/navbar.php") ?>
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Tambah Data Pencairan Dana<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" action="<?php echo site_url('Cpencairandana/saveDetailpencairandana');?>" method="post">
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Kode Rekening</label>
                                                <select class="form-control" name="id_rekening" id="id_rekening">
                                                <option>--Plilih Rekening--</option>
                                                    <?php foreach($rekening as $rowkenening){
                                                    echo "<option value='".$rowkenening->id_rekening."'uraian_rekening='".$rowkenening->uraian_rekening."'>".$rowkenening->kode_rekening."</option>";
                                                     } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Uraian</label>
                                                <input type = "text" class = "form-control" name="uraian_rekening" readonly> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Anggaran</label>
                                                <input type = "number" class = "form-control" name = "anggaran_dtlpncairan">
                                                <?php foreach($header as $rowId){?>
                                                <input type = "hidden" class = "form-control" name = "id_pencairan" value="<?= $rowId->id_pencairan?>">
                                                <?php } ?> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Realisasi Sebelumnya</label>
                                                <input type = "number" class = "form-control" name = "resseb_dtlpncairan"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Sisa Anggaran</label>
                                                <input type = "number" class = "form-control" name = "sisang_dtlpncairan"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Panjar Yang Diminta</label>
                                                <input type = "number" class = "form-control" name = "pnjr_dtlpncairan"> 
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger">Hapus</button>
                                    <a type="button" href="<?= site_url('Cpencairandana/index');?>" class="btn btn-info">Kembali</a>
                                </form>
                                <hr>
                                <?php foreach($header as $rowHeader) { ?>
                                    <table cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr><td>Judul </td><td> &nbsp; :</td><td> &nbsp; <?= $rowHeader->judul_pencairan?></td></tr>
                                        <tr><td>Dari</td><td> &nbsp; :</td><td> &nbsp; <?= $rowHeader->dari_pencairan?></td></tr>
                                        <tr><td>Kepada</td><td> &nbsp; :</td><td> &nbsp; <?= $rowHeader->kepada_pencairan?></td></tr>
                                        <tr><td>Perihal</td><td> &nbsp; :</td><td> &nbsp; <?= $rowHeader->perihal_pencairan?></td></tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <a type="button" href="<?= site_url('Cpencairandana/cetak/') . $rowHeader->id_pencairan;?>" class="btn btn-danger">Cetak</a>
                                <?php } ?>
                                <hr>
                                <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Rekening</th>
                                                <th>Uraian</th> 
                                                <th>Anggaran</th>
                                                <th>Realisasi Sebelumnya</th>
                                                <th>Sisa Anggaran</th>
                                                <th>Panjar Yang Diminta</th>
                                                <th colspan="2" style="text-align:center;">#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php $numstart = 1;
                                        $totalanggran = 0;
                                        $totaleresseb = 0;
                                        $totalsisang = 0;
                                        $totalpnjr = 0; 
                                        foreach ($detail as $row) 
                                        { 
                                            $totalanggran = $totalanggran + $row->anggaran_dtlpncairan;
                                            $totaleresseb = $totaleresseb + $row->resseb_dtlpncairan;
                                            $totalsisang = $totalsisang + $row->sisang_dtlpncairan;
                                            $totalpnjr = $totalpnjr + $row->pnjr_dtlpncairan;
                                        ?>
                                            <tr>
                                                <td><?php echo $numstart;?></td>
                                                <td><?php echo $row->kode_rekening; ?></td>
                                                <td><?php echo $row->uraian_rekening; ?></td>
                                                <td ><?php echo "Rp. " . number_format($row->anggaran_dtlpncairan,0,".","."); ?></td>
                                                <td ><?php echo "Rp. " . number_format($row->resseb_dtlpncairan,0,".","."); ?></td>
                                                <td ><?php echo "Rp. " . number_format($row->sisang_dtlpncairan,0,".","."); ?></td>
                                                <td ><?php echo "Rp. " . number_format($row->pnjr_dtlpncairan,0,".","."); ?></td>
                                                <td style="text-align:center;"> <a href="<?php echo site_url('Cpencairandana/editDetailpencairandana/').$row->id_detailpncairan;?>" class="btn btn-primary btn-sm"> Ubah</a></td>
                                                <td style="text-align:center;"> <a data-toggle="modal" data-target="#delete<?php echo $row->id_detailpncairan; ?>" class="btn btn-danger btn-sm"> Hapus</a></td>
                                                <?php $numstart++; } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3">Total</th>
                                                <td colspan="1"><?php echo "Rp. " . number_format($totalanggran,0,".","."); ?></td>
                                                <td colspan="1"><?php echo "Rp. " . number_format($totaleresseb,0,".","."); ?></td>
                                                <td colspan="1"><?php echo "Rp. " . number_format($totalsisang,0,".","."); ?></td>
                                                <td colspan="1"><?php echo "Rp. " . number_format($totalpnjr,0,".","."); ?></td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                            <th colspan="3">Terbilang</th>
                                            <td colspan="6"><?= terbilang($totalpnjr);?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($detail as $row) {?>
                <div class="modal fade" id="delete<?php echo $row->id_detailpncairan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="form-horizontal" action="<?php echo site_url('Cpencairandana/deleteDetailpencairan');?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Hapus data</h4>
                                            </div>
                                            <div class="modal-body">
                                                Hapus Data <?= $row->uraian_rekening ;?>?
                                                <input type="hidden" value="<?php echo $row->id_detailpncairan ; ?>" name="id_detailpncairan" class="form-control">
                                                <?php foreach($header as $rowId){?>
                                                <input type = "hidden" class = "form-control" name = "id_pencairan" value="<?= $rowId->id_pencairan?>">
                                                <?php } ?> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                <?php } ?>
            <?php $this->load->view("_partials/footer.php") ?>
        </div>
    </div>
	<?php $this->load->view("_partials/js.php") ?>
    <script>
        $(document).on('change', 'select[name=id_rekening]', function(e){
            var uraian_rekening = $('option:selected', this).attr('uraian_rekening');
            $('input[name=uraian_rekening]').val(uraian_rekening);
        });
    </script>
</body>
</html>