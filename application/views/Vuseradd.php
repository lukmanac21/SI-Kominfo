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
                            Tambah Data User<small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <form role="form" action="<?php echo site_url('Cuser/saveUser');?>" method="post">
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type = "text" class = "form-control" name = "nama_user"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control" name="id_role">
                                            <?php foreach($role as $row){?>
                                            <option value="<?= $row->id_role?>"><?= $row->nama_role?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type = "email" class = "form-control" name = "email_user"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type = "password" class = "form-control" name = "password_user"> 
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