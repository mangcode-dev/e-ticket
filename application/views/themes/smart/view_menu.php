<!-- start sidebar menu -->
<div class="sidebar-container">
	<div class="sidemenu-container navbar-collapse collapse fixed-menu">
		<div id="remove-scroll" class="left-sidemenu">
			<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
				<li class="sidebar-toggler-wrapper hide">
					<div class="sidebar-toggler">
						<span></span>
					</div>
				</li>
				<li class="sidebar-user-panel">
					<div class="sidebar-user">
						<div class="sidebar-user-picture">
							<img alt="image" src="<?php echo base_url() ?>themes/smart/img/dp.jpg">
						</div>
						<div class="sidebar-user-details">
							<div class="user-name">Sneha Patel</div>
							<div class="user-role">Administrator</div>
						</div>
					</div>
				</li>


				<!-- <li class="nav-item start active open">
					<a href="#" class="nav-link nav-toggle">
						<i data-feather="airplay"></i>
						<span class="title">Dashboard</span>
						<span class="selected"></span>
						<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item active">
							<a href="index.html" class="nav-link ">
								<span class="title">Dashboard 1</span>
								<span class="selected"></span>
							</a>
						</li>
						<li class="nav-item ">
							<a href="dashboard2.html" class="nav-link ">
								<span class="title">Dashboard 2</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="dashboard3.html" class="nav-link ">
								<span class="title">Dashboard 3</span>
							</a>
						</li>
					</ul>
				</li> -->

				<?php

				$resMenu = $this->backoffice_model->ShowMenu($this->session->userdata('sessUsrId'));

				if ($this->router->fetch_method() == 'edit' || $this->router->fetch_method() == 'rule') {
					$set_method = 'manage';
				} else {

					$set_method = $this->router->fetch_method();
				}
				$submenu_active = $this->router->fetch_class() . '/' . $set_method;

				

				foreach ($resMenu as $m) {

					$str_sactive = '';
					foreach ($m['sub_menu'] as $sme) {

						if ($sme['method'] == $submenu_active) {
							$str_sactive = 'class="nav-item start active open"';
							// echo '<li ' . $str_sactive . '>';
							break;
						} else {
							$str_sactive = 'class="nav-item"';
						}
					}

					// var_dump($submenu_active);
					// exit;

					echo '<li '.$str_sactive.'>';
					echo '<a href="#" class="nav-link nav-toggle"><i class="fa '.$m['icon_menu'].'"></i> <span class="title">'.$m['g_name'].' </span> <span class="arrow"></span></a>';
										
					echo '<ul class="sub-menu">';

					foreach($m['sub_menu'] as $sm){

						if($sm['method'] == $submenu_active){

							$str_active_sub = 'class="nav-item active"';
						}else{

							$str_active_sub = 'class="nav-item"';
						}

						echo '<li '.$str_active_sub.'>';
						echo '<a href="'.base_url().$sm['link'].'" class="nav-link "><span class="title">'.$sm['name'].'</span></a> </li>';

					}

					?>


					<?php

					echo '</ul>';


					echo '</li>';

				}

				?>






			</ul>
		</div>
	</div>
</div>
<!-- end sidebar menu -->