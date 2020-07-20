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
                            Ubah Data Pencairan Dana<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php foreach($detail as $row){?>
                                    <form role="form" action="<?php echo site_url('Cpencairandana/updateDetailpencairandana');?>" method="post">
                                        <div class = "row">
                                            <div class="col-sm-6">      
                                                <div class="form-group">
                                                    <label>Kode Rekening</label>
                                                    <select class="form-control" name="id_rekening" id="id_rekening">
                                                    <option>--Plilih Rekening--</option>
                                                        <?php foreach($rekening as $rowR) { ?>
                                                            <option value="<?= $rowR->id_rekening ?>"<?php echo "uraian_rekening='".$rowR->uraian_rekening."'"?><?php if ($row->id_rekening == $rowR->id_rekening) echo 'selected = "selected" '?>><?= $rowR->kode_rekening?></option>
                                                        <?php } ?>
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
                                                    <input type = "number" class = "form-control" name = "anggaran_dtlpncairan" value="<?= $row->anggaran_dtlpncairan?>">
                                                    <input type = "hidden" class = "form-control" name = "id_pencairan" value="<?= $row->id_pencairan?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">      
                                                <div class="form-group">
                                                <label>Realisasi Sebelumnya</label>
                                                    <input type = "number" class = "form-control" name = "resseb_dtlpncairan" value="<?= $row->resseb_dtlpncairan?>"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class = "row">
                                            <div class="col-sm-6">      
                                                <div class="form-group">
                                                <label>Sisa Anggaran</label>
                                                    <input type = "number" class = "form-control" name = "sisang_dtlpncairan" value="<?= $row->sisang_dtlpncairan?>"> 
                                                </div>
                                            </div>
                                            <div class="col-sm-6">      
                                                <div class="form-group">
                                                <label>Panjara Yang Diminta</label>
                                                    <input type = "number" class = "form-control" name = "pnjr_dtlpncairan" value="<?= $row->pnjr_dtlpncairan?>"> 
                                                    <input type = "hidden" class = "form-control" name = "id_detailpncairan" value="<?= $row->id_detailpncairan?>"> 
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-danger">Hapus</button>
                                    </form>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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