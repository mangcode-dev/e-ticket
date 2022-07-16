<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<!-- <div class="no-skin"> -->
		<aside id="left-panel">
<!-- <div class="main-container ace-save-state" id="main-container"> -->
		<!-- <div id="sidebar" class="sidebar responsive ace-save-state"> -->

			<!-- User info -->
		
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<body class="no-skin">

			<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state display" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div> --><!-- /.sidebar-shortcuts -->
			

				<nav>

				<ul class="nav nav-list" >


					

					<?php 
					
					$resMenu = $this->backoffice_model->ShowMenu($this->session->userdata('sessUsrId'));

					if($this->router->fetch_method() == 'edit' || $this->router->fetch_method() == 'rule'){

						$set_method = 'manage';
					}else{

						$set_method = $this->router->fetch_method();
					}
					 
					$submenu_active = $this->router->fetch_class().'/'.$set_method;


					
							
					foreach($resMenu as $m){	
						// var_dump($m);
						// $str_sactive = '';
						$str_sactive = '';
						foreach ($m['sub_menu'] as $sme) {
							// echo $sme['method']."<br>";

							if($sme['method'] == $submenu_active){
										$str_sactive = 'class="active open"';
										echo '<li '.$str_sactive.'>';
									}else{
									}
						}
						

						echo '<li '.$str_sactive.'>';
						echo '<a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-fw '.$m['icon_menu'].'"></i> <span class="menu-text">'.$m['g_name'].' </span>';

						echo '<b class="arrow fa fa-angle-down"></b></a>';

						?>
						<b class="arrow"></b>

						<?php

							echo '<ul class="submenu">';

								foreach($m['sub_menu'] as $sm){
									// echo base_url().$sm['link'];
									if($sm['method'] == $submenu_active){

										$str_active = 'class="active"';
									}else{

										$str_active = '';
									}


									echo '<li '.$str_active.'><a href="'.base_url().$sm['link'].'"><i class="menu-icon fa fa-caret-right"></i>'.$sm['name'].' 
											</a></li>';

								}

							?>


							<?php

							echo '</ul>';

						echo '</li>';
						//echo '</ul>';
						// $x=0;
					}

					?>



				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>




			

			<!-- <span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span> -->

		
		<!-- END NAVIGATION -->
		</div>
		</div>

			<!-- <div class="main-content">
		 <div class="main-container-inner">
			 	
			 		
			 </div>
			 </div> -->


		</body>
		<!-- </div> -->
		<!-- </div> -->
</nav>
		</aside>

		
