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
                            Ubah Data Barang<small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php foreach($data as $row){?>
                                <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Cbarang/updateBarang');?>" method="post">
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Jenis Barang</label>
                                                <select name="id_jenis" class="form-control">
                                                    <?php foreach($jenis as $rowJ){?>
                                                    <option value="<?= $rowJ->id_jenis?>"><?= $rowJ->nama_jenis?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type = "text" class = "form-control" name = "nama_barang" required value="<?= $row->nama_barang;?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Kegiatan</label>
                                                <select name="id_kegiatan" class="form-control">
                                                    <?php foreach($kegiatan as $rowK){?>
                                                    <option value="<?= $rowK->id_kegiatan?>"<?php if ($row->id_kegiatan == $rowK->id_kegiatan) echo 'selected = "selected"'?>><?= $rowK->nama_kegiatan?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Satuan</label>
                                                <select name="id_satuan" class="form-control">
                                                    <?php foreach($satuan as $rowS){?>
                                                    <option value="<?= $rowS->id_satuan?>"<?php if ($row->id_satuan == $rowS->id_satuan) echo 'selected = "selected"'?>><?= $rowS->nama_satuan?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Tanggal Barang</label>
                                                <input type = "date" class = "form-control" name = "tgl_barang" value="<?= $row->tgl_barang;?>"> 
                                                <input type = "hidden" class = "form-control" name = "id_barang" value="<?= $row->id_barang;?>"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Model Barang</label>
                                                <input type = "text" class = "form-control" name = "model_barang" value="<?= $row->model_barang;?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>UPC Barang</label>
                                                <input type = "text" class = "form-control" name = "upc_barang" value="<?= $row->upc_barang;?>"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>H/W Versi Barang</label>
                                                <input type = "text" class = "form-control" name = "hwversi_barang" value="<?= $row->hwversi_barang;?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>CMIIT Barang</label>
                                                <input type = "text" class = "form-control" name = "cmiit_barang" value="<?= $row->cmiit_barang;?>"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>K / G Barang</label>
                                                <input type = "text" class = "form-control" name = "kg_barang" value="<?= $row->kg_barang;?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Produk Barang</label>
                                                <input type = "text" class = "form-control" name = "produk_barang" value="<?= $row->produk_barang;?>"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Tipe Barang</label>
                                                <input type = "text" class = "form-control" name = "tipe_barang" value="<?= $row->type_barang;?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Plug Barang</label>
                                                <input type = "text" class = "form-control" name = "plug_barang" value="<?= $row->plug_barang;?>"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Power Barang</label>
                                                <input type = "text" class = "form-control" name = "power_barang" value="<?= $row->power_barang;?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Mac Barang</label>
                                                <input id="currency" type = "text" class = "currency form-control" name = "mac_barang" value="<?= $row->mac_barang;?>"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Seri Barang</label>
                                                <input type = "text" class = "form-control" name = "seri_barang" value="<?= $row->seri_barang;?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">      
                                            <div class="form-group">
                                                <label>Frekuensi Barang</label>
                                                <input type = "text" class = "form-control" name = "frek_barang" value="<?= $row->frek_barang;?>"> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="text" id="rupiah" class="form-control" name="harga_barang" value="<?= $row->harga_barang;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jumlah</label>
                                                <input text="number" class="form-control" min="1" name="stok_barang" value="<?= $row->stok_barang;?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>FCC Barang</label>
                                                <input text="text" class="form-control" name="fcc_barang" value="<?= $row->fcc_barang;?>">
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
                            <?php }?>
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