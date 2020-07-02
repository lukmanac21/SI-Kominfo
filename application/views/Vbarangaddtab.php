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
                            <button class="tablink" onclick="openPage('Router', this)" id="defaultOpen" >Router</button>
                            <button class="tablink" onclick="openPage('Switch', this)">Switch</button>
                            <button class="tablink" onclick="openPage('Ubiquiti', this)">Ubiquiti</button>
                            <button class="tablink" onclick="openPage('HT', this)">HT</button>
                            <button class="tablink" onclick="openPage('Earphone', this)">Earphone</button>
                            <button class="tablink" onclick="openPage('Laptop', this)">Laptop</button>
                            <button class="tablink" onclick="openPage('MM', this)">MM</button>
                            <hr>
                        <div id="Router" class="tabcontent">
                        <h3>Data Router</h3>
                            <br>
                            <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Cbarang/saveBarang');?>" method="post">
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
                                        <label>Nama Barang</label>
                                            <input type = "text" class = "form-control" name = "nama_barang"> 
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
                                        <label>Tanggal Barang</label>
                                            <input type = "date" class = "form-control" name = "tgl_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                    <div class="form-group">
                                    <label>Mac Barang / CC</label>
                                            <input type = "text" class = "form-control" name = "mac_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>FCC ID</label>
                                            <input type = "text" class = "form-control" name = "fcc_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Seri Barang</label>
                                            <input type = "text" class = "form-control" name = "seri_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Type</label>
                                            <input type = "text" class = "form-control" name = "type_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Flug</label>
                                            <input type = "text" class = "form-control" name = "flug_barang"> 
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
                        <div id="Switch" class="tabcontent">
                        <h3>Data Switch</h3>
                        <br>
                            <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Cbarang/saveBarang');?>" method="post">
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
                                        <label>Nama Barang</label>
                                            <input type = "text" class = "form-control" name = "nama_barang"> 
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
                                        <label>Tanggal Barang</label>
                                            <input type = "date" class = "form-control" name = "tgl_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                    <div class="form-group">
                                    <label>Model No</label>
                                            <input type = "text" class = "form-control" name = "model_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>UPC</label>
                                            <input type = "text" class = "form-control" name = "upc_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>H / W Versi</label>
                                            <input type = "text" class = "form-control" name = "hwversi_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>S / N</label>
                                            <input type = "text" class = "form-control" name = "seri_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Jumlah</label>
                                            <input type = "number" class = "form-control" name = "stok_barang" min="0"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label>Harga</label>
                                            <input type="text" class="form-control" name="harga_barang">
                                        </div>
                                    </div>
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

                        <div id="Ubiquiti" class="tabcontent">
                        <h3>Data Ubiquiti</h3>
                        <br>
                            <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Cbarang/saveBarang');?>" method="post">
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
                                        <label>Nama Barang</label>
                                            <input type = "text" class = "form-control" name = "nama_barang"> 
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
                                        <label>Tanggal Barang</label>
                                            <input type = "date" class = "form-control" name = "tgl_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>CMIIT ID</label>
                                            <input type = "text" class = "form-control" name = "cmiit_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Tipe Barang</label>
                                            <input type = "text" class = "form-control" name = "upc_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>K / G</label>
                                            <input type = "text" class = "form-control" name = "hwversi_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
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
                        <div id="HT" class="tabcontent">
                        <h3>HT</h3>
                        <br>
                            <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Cbarang/saveBarang');?>" method="post">
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
                                        <label>Nama Barang</label>
                                            <input type = "text" class = "form-control" name = "nama_barang"> 
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
                                        <label>Tanggal Barang</label>
                                            <input type = "date" class = "form-control" name = "tgl_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Model</label>
                                            <input type = "text" class = "form-control" name = "model_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Power</label>
                                            <input type = "text" class = "form-control" name = "power_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Frequency</label>
                                            <input type = "text" class = "form-control" name = "frek_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>CMIIT ID</label>
                                            <input type = "text" class = "form-control" name = "cmiit_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Seri Barang</label>
                                            <input type = "text" class = "form-control" name = "seri_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                            <input  type = "number" class = "form-control" name = "stok_barang" min="0"> 
                                        </div>      
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="number" class="form-control" name="harga_barang">
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
                        <div id="Earphone" class="tabcontent">
                        <h3>Earphone</h3>
                        <br>
                            <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Cbarang/saveBarang');?>" method="post">
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
                                        <label>Nama Barang</label>
                                            <input type = "text" class = "form-control" name = "nama_barang"> 
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
                                        <label>Tanggal Barang</label>
                                            <input type = "date" class = "form-control" name = "tgl_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Model</label>
                                            <input type = "text" class = "form-control" name = "model_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Seri Barang</label>
                                            <input type = "text" class = "form-control" name = "seri_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                            <input  type = "number" class = "form-control" name = "stok_barang" min="0"> 
                                        </div>      
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="number" class="form-control" name="harga_barang">
                                        </div>   
                                    </div>
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
                        <div id="Laptop" class="tabcontent">
                        <h3>Laptop</h3>
                        <br>
                            <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Cbarang/saveBarang');?>" method="post">
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
                                        <label>Nama Barang</label>
                                            <input type = "text" class = "form-control" name = "nama_barang"> 
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
                                        <label>Tanggal Barang</label>
                                            <input type = "date" class = "form-control" name = "tgl_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Seri Barang</label>
                                            <input type = "text" class = "form-control" name = "seri_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                            <input  type = "number" class = "form-control" name = "stok_barang" min="0"> 
                                        </div>      
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="number" class="form-control" name="harga_barang">
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
                        <div id="MM" class="tabcontent">
                        <h3>MM</h3>
                        <br>
                            <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Cbarang/saveBarang');?>" method="post">
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
                                        <label>Nama Barang</label>
                                            <input type = "text" class = "form-control" name = "nama_barang"> 
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
                                        <label>Tanggal Barang</label>
                                            <input type = "date" class = "form-control" name = "tgl_barang"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                        <label>Seri Barang</label>
                                            <input type = "text" class = "form-control" name = "seri_barang"> 
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                            <input  type = "number" class = "form-control" name = "stok_barang" min="0"> 
                                        </div>      
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="number" class=" form-control" name="harga_barang">
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
        </div>
    </div>
            <?php $this->load->view("_partials/footer.php") ?>
        </div>
    </div>
                        <?php $this->load->view("_partials/js.php") ?>
                        <script>
                    function openPage(pageName, elmnt) {
                    // Hide all elements with class="tabcontent" by default */
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }

                    // Remove the background color of all tablinks/buttons
                    tablinks = document.getElementsByClassName("tablink");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].style.backgroundColor = "";
                    }

                    // Show the specific tab content
                    document.getElementById(pageName).style.display = "block";
                    }

                    // Get the element with id="defaultOpen" and click on it
                    document.getElementById("defaultOpen").click();
                </script>
</body>
</html>