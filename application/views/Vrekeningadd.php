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
                            Tambah Data rekening<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" action="<?php echo site_url('Crekening/saverekening');?>" method="post">
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Kode rekening</label>
                                                <input type = "text" class = "form-control" name = "kode_rekening"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Uraian rekening</label>
                                                <input type = "text" class = "form-control" name = "uraian_rekening"> 
                                            </div>
                                        </div>
                                    </div>
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