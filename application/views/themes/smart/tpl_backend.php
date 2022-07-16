<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $page_title;?></title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() . $asset_url; ?>font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>

		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>ace-skins.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>ace-rtl.min.css" />

		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>jquery-ui.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url() . $js_url; ?>ace-extra.min.js"></script>
	</head>

	<body class="no-skin">

<?php echo $page_header;?>
<?php echo $page_menu;?>



<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url() . $js_url; ?>jquery-2.1.4.min.js"></script>
		<!-- <script src="http://code.jquery.com/jquery-1.10.2.js"></script> -->
		<!-- <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
		<script src="<?php echo base_url() . $js_url; ?>jquery-ui-1.11.4/jquery-ui.js"></script>
		
		<!-- <script src="<?php echo base_url() . $js_url; ?>jquery-ui.min.js"></script>


		<!-- <script src="<?php echo base_url() . $js_url; ?>jquery-1.11.3.min.js"></script> -->

	
		<!-- <![endif]-->

		<script src="<?php echo base_url() . $js_url; ?>bootstrap.min.js"></script>

		<script src="<?php echo base_url() . $js_url; ?>jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>buttons.flash.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>buttons.html5.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>buttons.print.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>buttons.colVis.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>dataTables.select.min.js"></script>

		

<?php echo $page_content;?>
<?php echo $page_footer;?>


		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url() . $js_url; ?>fuelux.wizard.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.validate.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>additional-methods.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>bootbox.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>select2.min.js"></script>


		<script src="<?php echo base_url() . $js_url; ?>jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.sparkline.index.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.flot.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.flot.pie.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>jquery.flot.resize.min.js"></script>



		<!-- ace scripts -->
		<script src="<?php echo base_url() . $js_url; ?>ace-elements.min.js"></script>
		<script src="<?php echo base_url() . $js_url; ?>ace.min.js"></script>
		


			


		<!--[if IE]>
		<script src="assets/js/jquery-1.11.3.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() . $js_url; ?>jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>


</script>












		
	</body>
</html>
