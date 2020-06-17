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
                            Tambah Data Peminjaman Barang<small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <form role="form" action="<?php echo site_url('Cpeminjaman/savePeminjaman');?>" method="post">
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <select name = "id_barang" class="form-control">
                                            <option>Not Selected</option>
                                            <?php foreach($brg as $rowBarang){?>
                                            <option value="<?php echo $rowBarang->id_barang?>"><?php echo $rowBarang->nama_barang; ?> <?php echo $rowBarang->seri_barang;?> <?php echo $rowBarang->mac_barang;?></option>
                                            <?php } ?>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type = "number" class = "form-control" name = "jumlah_barang">
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Nama Peminjam</label>
                                            <select name = "id_pegawai" class="form-control">
                                            <option>Not Selected</option>
                                            <?php foreach($usr as $rowUsr){?>
                                            <option value="<?php echo $rowUsr->id_dinas?>"><?php echo $rowUsr->nama_dinas;?></option>
                                            <?php } ?>
                                            </select> 
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