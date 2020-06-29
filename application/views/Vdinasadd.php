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
                            Tambah Data Dinas<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" action="<?php echo site_url('Cdinas/saveDinas');?>" method="post">
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type = "text" class = "form-control" name = "nama_dinas"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Alamat</label>
                                                <input type = "text" class = "form-control" name = "alamat_dinas"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>No Telp</label>
                                                <input type = "text" class = "form-control" name = "notelp_dinas"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Lattitude</label>
                                                <input type = "text" class = "form-control" name = "lat_dinas"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Longitude</label>
                                                <input type = "text" class = "form-control" name = "long_dinas"> 
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger">Hapus</button>
                                    <a href="<?= site_url('Cdinas/getKoordinat');?>" rel="noopener noreferrer" target="_blank" class="btn btn-warning">Koordinat</a>
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