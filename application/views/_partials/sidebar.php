<nav class="navbar-default navbar-side" role="navigation">
            <?php foreach($menu as $m){?>
                <div class="sidebar-collapse">
                    <div class="sidebar-header">
                        <ul class="nav" id="main-menu">
                    </div>
                            <li>
                                <p style="padding : 0px ; color: white;"></i> <?php echo $m->nama_menu;?></p>
                                <?php 
                                    $menuId = $m->id_menu;
                                    $roleId = $this->session->userdata('id_role');
                                    $querySub = "SELECT * FROM tbl_sub_menu inner join tbl_user_access on tbl_user_access.id_sub_menu = tbl_sub_menu.id_sub_menu where tbl_sub_menu.id_menu = $menuId and tbl_user_access.id_role = $roleId" ;
                                    $subMenu = $this->db->query($querySub)->result_array();
                                    foreach($subMenu as $sm){
                                ?>
                                <ul class="nav nav-second-level" style="padding: 0px;">
                                    <li>
                                        <a href="<?php echo site_url($sm['link_menu']);?>"><i class="<?php echo $sm['icon_sub_menu'];?>"></i> <?php echo $sm['nama_sub_menu'];?></a>
                                    </li>
                                </ul>
                                <?php }?>
                                <hr style="width:100%;margin:0">
                            </li>
                        </ul>
                </div>
            <?php }?>
        </nav>