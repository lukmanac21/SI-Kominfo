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
                            Tambah Data Barang<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Cbarang/saveBarang');?>" method="post">
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type = "text" class = "form-control" name = "nama_barang" required> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Tanggal Barang</label>
                                                <input type = "date" class = "form-control" name = "tgl_barang"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Kegiatan</label>
                                                <select name="id_kegiatan" class="form-control">
                                                    <?php foreach($kegiatan as $rowK){?>
                                                    <option value="<?= $rowK->id_kegiatan?>"><?= $rowK->nama_kegiatan?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Satuan</label>
                                            <select name="id_satuan" class="form-control">
                                                    <?php foreach($satuan as $rowS){?>
                                                    <option value="<?= $rowS->id_satuan?>"><?= $rowS->nama_satuan?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Mac Barang</label>
                                                <input id="currency" type = "text" class = "currency form-control" name = "mac_barang"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Seri Barang</label>
                                                <input type = "text" class = "form-control" name = "seri_barang"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                            <label>Jumlah</label>
                                                <input type = "number" class = "form-control" name = "stok_barang" min="0"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label>Harga</label>
                                                <input type="text" class="form-control" name="harga_barang">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            <label class="custom-file-label" for="pimages">Gambar</label>
                                                <input type="file" class="custom-file-input  form-control" name="pimages">
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
                <div id="map"></div>
            </div>
            <?php $this->load->view("Vcoordinat.php") ?>
            <?php $this->load->view("_partials/footer.php") ?>
        </div>
    </div>
	<?php $this->load->view("_partials/js.php") ?>
</body>
</html>