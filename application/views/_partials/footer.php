<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
<script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/morris/morris.js">
    </script>
    <script src="<?php echo base_url();?>assets/js/custom-scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        $('.form-check-input').on('click',function(){
            var menuId = $(this).data('menu');
            var roleId = $(this).data('role');


            $.ajax({
                url: "<?= site_url('Crole/changeaccess');?>",
                type:  "post",
                data: {
                    menuId : menuId,
                    roleId : roleId
                    }, 
                success : function(){
                    document.location.href = "<?= site_url('Crole/hakAksesUser/'); ?>" + roleId;
                    }
                });
            });
    </script>
    <script>
    $(document).ready(function(){
    //apply on typing and focus
    $('input.currency').on('blur',function(){
       $(this).manageCommas();
    });
    //then sanatize on leave
    // if sanitizing needed on form submission time, 
    //then comment beloc function here and call in in form submit function.
    $('input.currency').on('focus',function(){
        $(this).santizeCommas();
    });
    });

    String.prototype.addComma = function() {
        return this.replace(/(.)(?=(.{2})+$)/g,"$1:").replace(':.', '.');
    }
    //Jquery global extension method
    $.fn.manageCommas = function () {
        return this.each(function () {
        $(this).val($(this).val().replace(/(:|)/g,'').addComma());
        });
    }

    $.fn.santizeCommas = function() {
        return $(this).val($(this).val().replace(/(:| )/g,''));
    }
    </script>