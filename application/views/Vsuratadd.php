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
                            Tambah Data Barang<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Csurat/saveSurat');?>" method="post">
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>No Surat</label>
                                                <input type = "text" class = "form-control" name = "no_surat"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Tanggal Surat</label>
                                                <input type = "date" class = "form-control" name = "tgl_surat"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                            <label>Tujuan</label>
                                                <input type="text" class="form-control" name="tujuan_surat">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label class="custom-file-label" for="pimages">Gambar</label>
                                                <input type="file" class="custom-file-input  form-control" id="pimages" name="pimages">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php $this->load->view("_partials/footer.php") ?>
        </div>
    </div>
	<?php $this->load->view("_partials/js.php") ?>
</body>
</html>