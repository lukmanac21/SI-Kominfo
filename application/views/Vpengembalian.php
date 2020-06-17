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
                            Data Pengembalian<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
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
                                                <th>Tanggal Peminjaman</th>
                                                <th>Nama Barang</th> 
                                                <th>Jumlah Peminjaman</th>
                                                <th>Oleh</th>
                                                <th>Status</th>
                                                <th>Tanggal Pengembalian</th>
                                            </tr>
                                        </thead id="myTable">
                                        <tbody>
                                        <?php $numstart = $this->uri->segment(3) + 1;
                                        foreach ($data as $row) 
                                        { ?>
                                            <tr>
                                                <td><?php echo $numstart;?></td>
                                                <td><?php echo $row->tgl_peminjaman;?></td>
                                                <td><?php echo $row->nama_barang; ?></td>
                                                <td><?php echo $row->jumlah_barang; ?></td>
                                                <td><?php echo $row->nama_pegawai;?></td>
                                                <td><?php if($row->status_peminjaman == 1) echo "Sudah Dikembalikan"; else echo "Belum Dikembalikan";?></td>
                                                <td><?php echo $row->tgl_pengembalian;?></td>
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
                <?php $this->load->view("_partials/footer.php") ?>
            </div>
        </div>
    </div>
	<?php $this->load->view("_partials/js.php") ?>
</body>
</html>