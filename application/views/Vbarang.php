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
                            Data Barang<small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <a type="button" href="<?php echo site_url('Cbarang/Addbarang');?>" class="btn btn-primary btn-md">Tambah</a>
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
                                                <th>Tanggal</th>
                                                <th>Nama Barang</th>
                                                <th>Seri Barang</th> 
                                                <th>Mac Barang</th> 
                                                <th>Jumlah</th>
                                                <th colspan="2" style="text-align:center;">#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php $numstart = $this->uri->segment(3) + 1; 
                                        foreach ($data as $row) 
                                        { ?>
                                            <tr>
                                                <td><?php echo $numstart;?></td>
                                                <td><?php echo $row->tgl_barang; ?></td>                                                
                                                <td><?php echo $row->nama_barang; ?></td>
                                                <td><?php echo $row->seri_barang; ?></td>
                                                <td><?php echo $row->mac_barang; ?></td>
                                                <td><?php echo $row->stok_barang; ?></td>
                                                <td style="text-align:center;"> <a data-toggle="modal" data-target="#detail<?=$row->id_barang;?>" class="btn btn-info btn-sm"> Detail Foto</a></td>
                                                <td style="text-align:center;"> <a href="<?php echo site_url('Cbarang/editBarang/') . $row->id_barang;?>" class="btn btn-info btn-sm"> Ubah</a></td>
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
                <?php foreach ($data as $row) {?>
                <div class="modal fade" id="detail<?php echo $row->id_barang;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="form-horizontal">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Data Gambar</h4>
                                            </div>
                                            <div class="modal-body">
                                               <img src="<?= base_url ()?>assets/img/barang/<?php  echo $row->img_barang;?>" width="100%" class="img-thumbnail">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
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