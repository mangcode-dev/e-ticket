<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Nongnuch Garden Pattaya" />
	<meta name="author" content="mangcode" />
	<title><?php echo $page_title; ?></title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="<?php echo base_url() . $asset_url; ?>fonts/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() . $asset_url; ?>fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() . $asset_url; ?>fonts/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() . $asset_url; ?>fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="<?php echo base_url() . $asset_url; ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . $asset_url; ?>plugins/material/material.min.css">
	<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>material_style.css">
	<link rel="stylesheet" href="<?php echo base_url() . $asset_url; ?>plugins/jquery-toast/dist/jquery.toast.min.css"> 
	<!-- Theme Styles -->
	<link href="<?php echo base_url() . $css_url; ?>theme/light/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="<?php echo base_url() . $css_url; ?>plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() . $css_url; ?>theme/light/style.css" rel="stylesheet" type="text/css" /> 
	<link href="<?php echo base_url() . $css_url; ?>responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() . $css_url; ?>theme/light/theme-color.css" rel="stylesheet" type="text/css" /> 
	<link href="<?php echo base_url() . $asset_url; ?>plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet">
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo base_url() . $asset_url; ?>img/favicon.ico" />
	<?php echo $page_style; ?>
</head>

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo customscroll" >
	<div class="page-wrapper">
		<?php echo $page_header; ?>

		<!-- start color quick setting -->
		<div class="settingSidebar">
			<a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
			</a>
			<div class="settingSidebar-body ps-container ps-theme-default">
				<div class=" fade show active">
					<div class="setting-panel-header">Setting Panel
					</div>
					<div class="quick-setting slimscroll-style">
						<ul id="themecolors">
							<li>
								<p class="sidebarSettingTitle">Sidebar Color</p>
							</li>
							<li class="complete">
								<div class="theme-color sidebar-theme">
									<a href="#" data-theme="white"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="blue"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="indigo"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="cyan"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="green"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="red"><span class="head"></span><span class="cont"></span></a>
								</div>
							</li>
							<li>
								<p class="sidebarSettingTitle">Header Brand color</p>
							</li>
							<li class="theme-option">
								<div class="theme-color logo-theme">
									<a href="#" data-theme="logo-white"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="logo-dark"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="logo-blue"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="logo-indigo"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="logo-cyan"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="logo-green"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="logo-red"><span class="head"></span><span class="cont"></span></a>
								</div>
							</li>
							<li>
								<p class="sidebarSettingTitle">Header color</p>
							</li>
							<li class="theme-option">
								<div class="theme-color header-theme">
									<a href="#" data-theme="header-white"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="header-dark"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="header-blue"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="header-indigo"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="header-cyan"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="header-green"><span class="head"></span><span class="cont"></span></a>
									<a href="#" data-theme="header-red"><span class="head"></span><span class="cont"></span></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- end color quick setting -->

		<!-- start page container -->
		<div class="page-container">
			<?php echo $page_menu; ?>
			<div class="page-content-wrapper">
				<div class="page-content" style="min-height:867px">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title"><?=$pageTitle?></div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<!-- <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li> -->
								<li><i class="<?=$list_icon?>"></i>&nbsp; <a class="parent-item" href=""><?=$list_parent?></a>&nbsp;<i class="fa fa-angle-right"></i></li>
								<li class="active"><?=$list_child?></li>
							</ol>
						</div>
					</div>
					<div class="row">
						<?php echo $page_content; ?>
					</div> 
				</div>
			</div> 
		</div>
		<!-- end page container -->

		<?php echo $page_footer; ?>  
	</div>
	<?php echo $page_modal; ?>
	<!-- start js include path -->
	<script src="<?php echo base_url() . $asset_url; ?>plugins/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url() . $asset_url; ?>plugins/popper/popper.js"></script>
	<script src="<?php echo base_url() . $asset_url; ?>plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="<?php echo base_url() . $asset_url; ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="<?php echo base_url() . $asset_url; ?>plugins/feather/feather.min.js"></script>

	<!-- bootstrap -->
	<script src="<?php echo base_url() . $asset_url; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() . $asset_url; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>  
	<!-- Common js-->
	<script src="<?php echo base_url() . $js_url; ?>app.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>layout.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>theme-color.js"></script>
	<!-- material -->
	<script src="<?php echo base_url() . $asset_url; ?>plugins/material/material.min.js"></script>
	<script src="<?php echo base_url() . $asset_url; ?>plugins/sweet-alert/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url() . $asset_url; ?>plugins/sweet-alert/sweetalert2.min.js"></script>
	<script src="<?php echo base_url() . $js_url; ?>pages/sweet-alert/sweet-alert-data.js"></script>
 
	<?php echo $page_script; ?> 
</body>

</html>