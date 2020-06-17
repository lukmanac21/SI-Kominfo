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
                            Ubah Data Menu<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php foreach($data as $row){ ?>
                                <form role="form" action="<?php echo site_url('Cmenu/updateMenu');?>" method="post">
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Nama Menu</label>
                                                <input type = "text" class = "form-control" name = "nama_menu" value = "<?php echo $row->nama_menu ;?>">
                                                <input type = "hidden" class = "form-control" name = "id_menu" value = "<?php echo $row->id_menu ;?>">  
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="is_active" class="form-control">
                                                <option value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            <?php } ?>
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