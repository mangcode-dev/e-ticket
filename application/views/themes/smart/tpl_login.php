<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<meta name="description" content="Nongnooch Garden Pattay - E-TICKET" />
		<meta name="author" content="Mangcode Team" />
		<title>E-TICKET | LOGIN</title>
		<!-- google font -->
		<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" -->
			<!-- type="text/css" /> -->
		<!-- icons -->
		<link rel="stylesheet" href="<?php echo base_url() . $asset_url; ?>plugins/iconic/css/material-design-iconic-font.min.css">
		<!-- bootstrap -->
		<link href="<?php echo base_url() . $asset_url; ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Theme Styles -->
		<link href="<?php echo base_url() . $css_url; ?>theme/full/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
		<!-- style -->
		<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>pages/login.css">
		<!-- favicon -->
		<link rel="shortcut icon" href="../assets/img/favicon.ico" />
		<link rel="stylesheet" href="<?php echo base_url() . $asset_url; ?>plugins/jquery-toast/dist/jquery.toast.min.css">
	</head>

	<body>
		<?php echo $page_content;?>
		<!-- basic scripts -->



		</script>
	<script src="<?php echo base_url()  ?>themes/smart/plugins/jquery/jquery.min.js"></script>
	<!-- bootstrap -->
		<script src="<?php echo base_url() ?>themes/smart/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>themes/smart/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
	<script src="<?php echo base_url() ?>themes/smart/plugins/jquery-toast/dist/toast.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
	function alert_message(heading , text , loaderBg , icon ){
				 $.toast({
					heading:heading,
					text: text,
					position: 'top-right',
					loaderBg:loaderBg,
					icon: icon,
					hideAfter: 3000,
					stack: 6
				});
	}
	<?php
	if ($str_validate == FALSE){ echo validation_errors(); }
	if ($this->session->flashdata('msg_error') != ''){ echo $this->session->flashdata('msg_error'); }
	?>
});
</script>
	</body>
</html>
