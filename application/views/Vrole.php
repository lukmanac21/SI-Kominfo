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
                            Data Role<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <a type="button" href="<?php echo  site_url('Crole/Addrole'); ?>" class="btn btn-primary btn-md">Tambah</a>
                            <br>
                            <br>
                                <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari" class="form-control">
                                    </div>
                                </div>
                                <br>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th colspan="2" style="text-align:center;">#</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1 ; 
                                            foreach ($data as $row) 
                                        { ?>
                                        <tbody id="myTable">
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->nama_role; ?></td>
                                                <td style="text-align:center;"> <a href = "<?php echo site_url('Crole/hakAksesUser/') . $row->id_role ;?>" class="btn btn-warning btn-sm"> Hak Akses</a></td>
                                                <td style="text-align:center;"> <a href = "<?php echo site_url('Crole/editUser/') . $row->id_role; ?>" class="btn btn-info btn-sm">Ubah</a></td>
                                        </tbody>
                                        <?php
                                    $i++; 
                                    } ?>
                                    </table>
                                </div>
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