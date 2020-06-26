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
                            Data User<small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <a type="button" href="<?php echo  site_url('Cuser/Adduser'); ?>" class="btn btn-primary btn-md">Tambah</a>
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
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th colspan="2" style="text-align:center;">#</th>
                                            </tr>
                                        </thead>
                                        <?php $numstart = $this->uri->segment(3) + 1; 
                                            foreach ($data as $row) 
                                        { ?>
                                        <tbody id="myTable">
                                            <tr>
                                                <td><?php echo $numstart;?></td>
                                                <td><?php echo $row->nama_user; ?></td>
                                                <td><?php echo $row->email_user; ?></td>
                                                <td><?php echo $row->nama_role; ?></td>
                                                <td style="text-align:center;"> <a href = "<?php echo site_url('Cuser/editUser/') . $row->id_user; ?>" class="btn btn-info btn-sm"> Ubah</a></td>
                                                <td style="text-align:center;"> <a data-toggle="modal" data-target="#delete<?php echo $row->id_user; ?>" class="btn btn-danger btn-sm"> Hapus</a></td>
                                        </tbody>
                                        <?php
                                    $numstart++; 
                                    } ?>
                                    </table>
                                    <div class="row">
                                        <div class="col">
                                            <!--Tampilkan pagination-->
                                            <?php echo $pagination; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /. ROW  -->
                <?php foreach ($data as $row) {?>
                <div class="modal fade" id="delete<?php echo $row->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="form-horizontal" action="<?php echo site_url('Cuser/hapusUser');?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Hapus data</h4>
                                            </div>
                                            <div class="modal-body">
                                                Hapus semua data <?php echo $row->nama_user;?> ?
                                                <input type="hidden" value="<?php echo $row->id_user ; ?>" name="id_user" class="form-control">
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
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
	<?php $this->load->view("_partials/js.php") ?>
</body>
</html>