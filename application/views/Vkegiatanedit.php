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
                            Ubah Data kegiatan<small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php foreach($data as $row){?>
                            <form role="form" action="<?php echo site_url('Ckegiatan/updatekegiatan');?>" method="post">
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Kode Kegiatan</label>
                                            <input type = "text" class = "form-control" name = "kode_kegiatan" value ="<?php echo $row->kode_kegiatan;?>"> 
                                            <input type = "hidden" class = "form-control" name = "id_kegiatan" value ="<?php echo $row->id_kegiatan;?>"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type = "text" class = "form-control" name = "nama_kegiatan" value ="<?php echo $row->nama_kegiatan;?>"> 
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
                <!-- /. ROW  -->
                <?php $this->load->view("_partials/footer.php") ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
	<?php $this->load->view("_partials/js.php") ?>
</body>
</html>