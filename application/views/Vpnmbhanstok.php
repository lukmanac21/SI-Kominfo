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
                            Data Penambahan Stok<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <a type="button" href="<?php echo site_url('Cpenambahanstok/Addstok');?>" class="btn btn-primary btn-md">Tambah</a>
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
                                                <th>Jumlah Penambahan</th>
                                                <th style="text-align:center;">#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php $numstart = $this->uri->segment(3) + 1;
                                        foreach ($data as $row) 
                                        { ?>
                                            <tr>
                                                <td><?php echo $numstart;?></td>
                                                <td><?php echo $row->tgl_pnmbhnstkbrg;?></td>
                                                <td><?php echo $row->nama_barang; ?></td>
                                                <td><?php echo $row->jumlah_barang; ?></td>
                                                <td style="text-align:center;"> <a data-toggle="modal" data-target="#delete<?php echo $row->id_pnmbhnstkbrg; ?>" class="btn btn-danger btn-sm"> Hapus</a></td>
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
                <div class="modal fade" id="delete<?php echo $row->id_pnmbhnstkbrg;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="form-horizontal" action="<?php echo site_url('Cpenambahanstok/hapusPnmbhn');?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Hapus data</h4>
                                            </div>
                                            <div class="modal-body">
                                                Hapus data transaksi tanggal <?php echo $row->tgl_pnmbhnstkbrg ;?>, Nama Barang <?php echo $row->nama_barang;?>?
                                                <input type="hidden" value="<?php echo $row->id_pnmbhnstkbrg ; ?>" name="id_pnmbhnstkbrg" class="form-control">
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
        </div>
    </div>
	<?php $this->load->view("_partials/js.php") ?>
</body>
</html>