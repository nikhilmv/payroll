



    <footer class="main-footer">

        <div class="pull-right hidden-xs">

          <b>Pioneercodes</b> Administration

        </div>

        <strong>Copyright &copy; 2019 Pioneercodes All rights reserved.

    </footer>

    

    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js" type="text/javascript"></script>

    <!-- <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script> -->

    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>

    <script type="text/javascript">

        var windowURL = window.location.href;

        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));

        var x= $('a[href="'+pageURL+'"]');

            x.addClass('active');

            x.parent().addClass('active');

        var y= $('a[href="'+windowURL+'"]');

            y.addClass('active');

            y.parent().addClass('active');

    </script>

	<script>

	$('h4.sidebar-menu-h4').click(function(){

	var id = $(this).attr('id');

	$("#" + id + "-ul").toggle();

    });

	</script>

	<style>

	.sidebar-menu-h4

	{

	color: #ffff; padding-left: 10px; cursor: pointer; background-color: #1a2226; padding-top: 7px; padding-bottom: 10px;

	border-bottom: 1px solid #0096d6;

    margin-bottom: 5px;

    margin-top: 5px;

	}

	</style>

	<script>

	$('li.active').parents('ul').addClass('active');

	$(".sidebar-menu.active").show();

	</script>

  </body>

</html>