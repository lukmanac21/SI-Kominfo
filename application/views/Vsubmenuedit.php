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
                            Ubah Data Sub Menu<small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php foreach($data as $row){?>
                            <form role="form" action="<?php echo site_url('Csubmenu/updateSubmenu');?>" method="post">
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Nama Menu</label>
                                            <select name="id_menu" class="form-control">
                                            <?php foreach($select as $rowMenu){?>    
                                                <option value="<?php echo $rowMenu->id_menu; ?>"<?php if($row->id_menu==$rowMenu->id_menu) echo 'selected="selected"'; ?>><?php echo $rowMenu->nama_menu; ?></option>
                                            <?php } ?>
                                            </select>
                                            <input type = "hidden" class="form-control"  name = "id_sub_menu" value="<?php echo $row->id_sub_menu?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Sub Menu</label>
                                            <input type = "text" class="form-control"  name = "nama_sub_menu" value="<?php echo $row->nama_sub_menu?>">
                                        </div>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-sm-6">      
                                        <div class="form-group">
                                            <label>Icon</label>
                                            <input type = "text" class="form-control"  name = "icon_sub_menu" value="<?php echo $row->icon_sub_menu?>"> 
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type = "text" class = "form-control" name = "link_menu" value="<?php echo $row->link_menu?>"> 
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Hapus</button>
                            </form>
                            <?php } ?>
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