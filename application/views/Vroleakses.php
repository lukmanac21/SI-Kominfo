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
                            Data Hak Ases<small></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <br>
                            <h2>Role <?= $role['nama_role'];?></h2>
                            <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th>Nama Menu</th>
                                                <th>Akses</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                        <?php $i = 1 ; 
                                        foreach ($data as $row) { ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row->nama_sub_menu; ?></td>
                                                <td>
                                                    <div id="form-check-input" class = "form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                        <?= get_access($role['id_role'],$row->id_sub_menu);?>
                                                        data-role="<?= $role['id_role'];?>" data-menu="<?= $row->id_sub_menu;?>">
                                                    </div>
                                                </td>
                                        <?php $i++; }?>
                                        </tbody>
                                    </table>
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