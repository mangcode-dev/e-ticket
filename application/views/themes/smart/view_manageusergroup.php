<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<?php 
					$setHeadContent = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
				?>
				<!-- breadcrumb -->
				<!-- <ol class="breadcrumb">					 -->
					<!-- <li><?php echo $setHeadContent;?></li> -->
				<!-- </ol> -->

				<!-- <div class="breadcrumbs" id="breadcrumbs"> -->
						

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-group group-icon"></i>
								<a href="#">GROUPS</a>
							</li>

							<li>
								<a href="#"><?php echo $setHeadContent;?></a>
							</li>
							<!-- <li class="active">Form Elements</li> -->

						</ul><!-- /.breadcrumb -->

						<!-- <div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div> --><!-- /.nav-search -->
					<!-- </div> -->

					<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div>


				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right" style="margin-right:25px">
					<a href="#" id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa fa-grid"></i> Change Grid</a>
					<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa fa-plus"></i> Add</span>
					<button id="search" class="btn btn-ribbon" data-title="search"><i class="fa fa-search"></i> <span class="hidden-mobile">Search</span></button>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- #MAIN CONTENT -->

				<p>&nbsp;</p>
				<!-- col -->
			
				<!-- end col -->

			<div class="row" style="margin:0;padding:0;">
					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<?php if ($this->session->flashdata('msgError') != ''){ echo $this->session->flashdata('msgError'); } ?>
									<?php if ($this->session->flashdata('msgResponse') != ''){ echo $this->session->flashdata('msgResponse'); } ?>
					</div>
					
					<div class="col-sm-5 col-md-5 col-lg-5">

						<!-- Widget ID (each widget will need unique ID)-->
						<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
							<!-- widget options:
									usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
									
									data-widget-colorbutton="false"	
									data-widget-editbutton="false"
									data-widget-togglebutton="false"
									data-widget-deletebutton="false"
									data-widget-fullscreenbutton="false"
									data-widget-custombutton="false"
									data-widget-collapsed="true" 
									data-widget-sortable="false"
									
								-->
								
								<div class="page-header">
									<h1>
										LIST USERGROUPS
										<!-- <small>
											<i class="ace-icon fa fa-angle-double-right"></i>
											Common form elements and layouts
										</small> -->
									</h1>
								</div>

								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										
									</div>
									<div class="widget-body no-padding">
										<?php echo form_open('#', array('id' => 'frm_usergroupmanagement', 'name'=>'frm_usergroupmanagement'));?>
										


										<table class="table table-striped table-bordered table-hover" width="100%">

											<thead>	
													                
												<tr>
													<th style="text-align:center;">No</th>
													<th data-class="expand"><i class="fa fa-fw fa-group text-muted hidden-md hidden-sm hidden-xs"></i> Name</th>
													<th>Staus</th>
													<th data-hide="phone,tablet">Action</th>
												</tr>

											</thead>
										
											<tbody>

												<?php
												 

												  $list_usergroup = array_filter($list_usergroup);

										    	  if (!empty($list_usergroup)) {
												   
												  $i = 1;	  											  
												  foreach ($list_usergroup as $usergroup_detail){
													  
													  if ($usergroup_detail['enable'] == '1'){ 
													  
													  	$txt_status = 'ENABLE'; 
													  	$txt_color = '#0EC952';
													  
													  }else{
														 
														$txt_status = 'DISABLE'; 
													  	$txt_color = '#FF0000'; 
														
													  }
											  
													 
												?>


												<tr>
													<td style="text-align:center;"><?php echo $i;?></td>
													<td><?php echo $usergroup_detail['name'];?></td>
													
													<td><?php echo '<span style="color:'.$txt_color.'">'.$txt_status.'</span>';?></td>
													
													<td>

													<button type="button" class='btn btn-xs btn-default' data-original-title='Edit' onclick="javascript:window.location='<?php echo base_url().'usergroup/manage/'.$usergroup_detail['sug_id'];?>';"><i class='fa fa-pencil'></i></button>

													<button type="button" class='btn btn-xs btn-default' data-original-title='Delete' onclick="javascript:if(confirm('คุณต้องการลบรายการนี้ใช่หรือไม่?')){ window.location='<?php echo base_url().'usergroup/delete/'.$usergroup_detail['sug_id'];?>'; }else{ return false; }"><i class='fa fa-trash-o'></i></button>
													</td>

												</tr>
												
												<?php $i++; } }else{ ?>
							                    <tr>
							                      	<td colspan="4" style="text-align:center;">Data Not Found.</td>
							                    </tr>
							                    <?php } ?>


												
											</tbody>

										</table>
										<?php echo form_close();?>
									</div>




								</div>
						</div>
					</div>

					<div class="col-sm-5 col-md-5 col-lg-5">

						<!-- Widget ID (each widget will need unique ID)-->
						<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
							<!-- widget options:
									usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
									
									data-widget-colorbutton="false"	
									data-widget-editbutton="false"
									data-widget-togglebutton="false"
									data-widget-deletebutton="false"
									data-widget-fullscreenbutton="false"
									data-widget-custombutton="false"
									data-widget-collapsed="true" 
									data-widget-sortable="false"
									
								-->
								<div class="page-header">
									<h1>
										FORM USERGROUPS
										<!-- <small>
											<i class="ace-icon fa fa-angle-double-right"></i>
											Common form elements and layouts
										</small> -->
									</h1>
								</div>

								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										
									</div>

									<div class="widget-body no-padding">
							<?php if($frmEdit==FALSE){ ?>
								<?php echo form_open('usergroup/add', array('id'=>'smart-form-register', 'class'=>'form-horizontal'));?>

								<div class="row">
									<div class="col-xs-12">
											<div class="col-xs-1">
											</div>
											<div class="col-xs-10">
											<div class="form-group">
												<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_name" placeholder="Usergroup Name" class="width-100" />
																		<i class="ace-icon fa fa-group"></i>
												</span>
											</div>
											<div class="form-group">

												<div class="radio">
														Status
														<label>
															<input checked="checked" type="radio" name="rad_status" value="1" <?php echo set_radio('rad_status', '1', TRUE); ?> class="ace" />
															<span class="lbl"> Enable </span>

															
														</label>

														<label>
															<input type="radio" name="rad_status" value="0" <?php echo set_radio('rad_status', '0'); ?> class="ace" />
															<span class="lbl"> Disable </span>

														</label>
													</div>
											</div>
											</div>
											<div class="col-xs-1">
											</div>

									</div>

								</div>

											<div class="clearfix form-actions">
												<div class="center">

													<button type="submit" class="btn btn-primary">
													Add
												</button>
												<input type="hidden" name="action" value="<?php echo base64_encode('addUsergroup');?>"  />

													<!-- &nbsp; &nbsp; &nbsp;
													<button class="btn" type="reset">
														<i class="ace-icon fa fa-undo bigger-110"></i>
														Reset
													</button> -->
												</div>
											</div>

								<?php echo form_close(); ?>

							<?php }else{// Form Edit ?>

								<?php echo form_open('usergroup/edit/'.$usrDataEdit['sug_id'].'', array('id'=>'smart-form-register', 'class'=>'form-horizontal'));?>



								<div class="row">
									<div class="col-xs-12">
											<div class="col-xs-1">
											</div>
											<div class="col-xs-10">
											<div class="form-group">
												<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_name" placeholder="Usergroup Name" value="<?php echo $usrDataEdit['name']; ?>" class="width-100" />
																		<i class="ace-icon fa fa-group"></i>
												</span>
											</div>
											<div class="form-group">

												<div class="radio">
														Status
														<label>
															<input checked="checked" type="radio" name="rad_status" value="1" <?php if($usrDataEdit['enable']=='1'){ echo 'checked="checked"';}else{ echo set_radio('rad_status', '1', TRUE); }?> class="ace" />
															<span class="lbl"> Enable </span>

															
														</label>

														<label>
															<input type="radio" name="rad_status" value="0" <?php if($usrDataEdit['enable']=='0'){ echo 'checked="checked"';}else{ echo set_radio('rad_status', '0');}?> class="ace" />
															<span class="lbl"> Disable </span>

														</label>
													</div>
											</div>
											<?php
												foreach($excPerG->result() as $pg){ 
											?>
										<div class="form-group">
											<!-- <div class="col-xs-1"> -->
													<!-- <label class="col-sm-10 control-label no-padding-right" for="form-field-1">  -->
													<!-- </div> -->

														<!-- <div class="col-xs-6"> -->
															
																<input name="chkRid[]" id="subscription" type="checkbox" value="<?php echo $pg->spg_id;?>" <?php if(in_array($pg->spg_id, $excRule)===true){ echo 'checked="checked"';}?> class="ace" />
																<span class="lbl"></span>
															

														<!-- <label class="pos-rel"> -->

																
																
																<i></i><?php echo $pg->name;?>
																<span class="lbl"></span>
																
														<!-- </label> -->
															
														

														<!-- </div> -->
													 <!-- </label> -->
												</div>
												<?php } ?>
											</div>
											<div class="col-xs-1">
											</div>

									</div>

								</div>

										<div class="clearfix form-actions">
										<div class="center">
											<!-- <div class="col-md-offset-1 col-md-1"> -->
											<!-- </div> -->

												<button type="submit" class="btn btn-primary">
											Save
										</button>
										<button type="submit" name="btn_saveapply" class="btn btn-primary" value="T">
											Save &amp; Apply for all users
										</button>
										<input type="hidden" name="action" value="<?php echo base64_encode('editUsergroup');?>"  />
											
										</div>
										</div>



								<?php echo form_close(); ?>
							<?php } ?>
							</div>


								</div>
						</div>
					</div>


				</div>



				
				<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->
		<p>&nbsp;</p>


		