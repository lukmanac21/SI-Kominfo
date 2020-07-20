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
                            Data Pencairan Dana<small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <a type="button" href="<?php echo site_url('Cpencairandana/Addpencairandana');?>" class="btn btn-primary btn-md">Tambah</a>
                            <br>
                            <br>
                                <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari" class="form-control">
                                    </div>
                                </div>
                                <br>  
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No Surat</th>
                                                <th>Judul Surat</th> 
                                                <th>Dari</th>
                                                <th>Kepada</th>
                                                <th>Perihal</th>
                                                <th>Tanggal Pencairan</th>
                                                <th colspan="3" style="text-align:center;">#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php $numstart = $this->uri->segment(3) + 1; 
                                        foreach ($data as $row) 
                                        { ?>
                                            <tr>
                                                <td><?php echo $numstart;?></td>
                                                <td><?php echo $row->nosurat_pencairan; ?></td>
                                                <td><?php echo $row->judul_pencairan; ?></td>
                                                <td><?php echo $row->dari_pencairan; ?></td>
                                                <td><?php echo $row->kepada_pencairan; ?></td>
                                                <td><?php echo $row->perihal_pencairan; ?></td>
                                                <td><?php echo $row->tgl_pencairan; ?></td>
                                                <td style="text-align:center;"> <a href="<?php echo site_url('Cpencairandana/editpencairandana/') . $row->id_pencairan;?>" class="btn btn-info btn-sm"> Ubah</a></td>
                                                <td style="text-align:center;"> <a href="<?php echo site_url('Cpencairandana/adddetailpencairandana/') . $row->id_pencairan;?>" class="btn btn-success btn-sm"> Tambah Detail</a></td>
                                                <td style="text-align:center;"> <a href="<?php echo site_url('Cpencairandana/cetak/') . $row->id_pencairan;?>" class="btn btn-danger btn-sm"> Cetak</a></td>
                                                <?php $numstart++; } ?>
                                        </tbody>
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
                <?php $this->load->view("_partials/footer.php") ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
	<?php $this->load->view("_partials/js.php") ?>
</body>
</html>