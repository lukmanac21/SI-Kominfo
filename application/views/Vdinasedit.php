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
                            Ubah Data Dinas<small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php foreach($data as $row){?>
                            <form role="form" action="<?php echo site_url('Cdinas/updateDinas');?>" method="post">
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type = "text" class = "form-control" name = "nama_dinas" value ="<?php echo $row->nama_dinas;?>"> 
                                            <input type = "hidden" class = "form-control" name = "id_dinas" value ="<?php echo $row->id_dinas;?>"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type = "text" class = "form-control" name = "alamat_dinas" value ="<?php echo $row->alamat_dinas;?>"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>No Telepon Dinas</label>
                                            <input type = "text" class = "form-control" name = "notelp_dinas" value ="<?php echo $row->notelp_dinas;?>"> 
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