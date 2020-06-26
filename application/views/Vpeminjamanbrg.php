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
                            Data Peminjaman<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <a type="button" href="<?php echo site_url('Cpeminjaman/Addpeminjaman');?>" class="btn btn-primary btn-md">Tambah</a>
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
                                                <th>Jumlah Peminjaman</th>
                                                <th>Oleh</th>
                                                <th>Status</th>
                                                <th style="text-align:center;">#</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php
                                        $numstart = $this->uri->segment(3) + 1;
                                        foreach ($data as $row) 
                                        { ?>
                                            <tr>
                                                <td><?php echo $numstart;?></td>
                                                <td><?php echo $row->tgl_peminjaman;?></td>
                                                <td><?php echo $row->nama_barang; ?> <?php echo $row->seri_barang;?></td>
                                                <td><?php echo $row->jumlah_barang; ?></td>
                                                <td><?php echo $row->nama_pegawai;?></td>
                                                <td><?php if($row->status_peminjaman == 1) echo "Sudah Dikembalikan"; else echo "Belum Dikembalikan";?></td>
                                                <td style="text-align:center;"> <a data-toggle="modal" data-target="#update<?php echo $row->id_peminjaman; ?>" class="btn btn-info btn-sm"> Ubah Status</a></td>
                                                <?php 
                                            $numstart++; } ?>
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
                <div class="modal fade" id="update<?php echo $row->id_peminjaman;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="form-horizontal" action="<?php echo site_url('Cpeminjaman/updatePeminjaman');?>" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Update status pengembalian</h4>
                                            </div>
                                            <div class="modal-body">
                                                Apakah barang  <?php echo $row->nama_barang;?> sudah dikembalikan oleh <?php echo $row->nama_pegawai;?> ?
                                                <input type="hidden" value="<?php echo $row->id_peminjaman ; ?>" name="id_peminjaman" class="form-control">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" >Sudah</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Belum</button>
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