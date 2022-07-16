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
								<i class="ace-icon fa fa-unlock-alt fa-unlock-alt-icon"></i>
								<a href="#">PERMISSION</a>
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
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
				<?php if ($this->session->flashdata('msgError') != ''){ echo $this->session->flashdata('msgError'); } ?>
					<?php if ($this->session->flashdata('msgResponse') != ''){ echo $this->session->flashdata('msgResponse'); } ?>
				</div>
				

				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
				
					<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">


						<div class="page-header">
									<h1>
										LIST PERMISSION GROUP
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
							<!-- end widget edit box -->


									<!-- widget content -->
									<div class="widget-body no-padding">
										
										<?php echo form_open('#', array('id' => 'frm_permissiongroupmanagement', 'name'=>'	frm_permissiongroupmanagement'));?>

										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover" width="100%">

												<thead>	
														                
													<tr>
														<th style="text-align:center;">No</th>
														<th data-class="expand"><i class="fa fa-fw fa-unlock-alt text-muted hidden-md hidden-sm hidden-xs"></i> Name</th>
														<th data-hide="phone,tablet">Staus</th>
														<th data-hide="phone,tablet">Action</th>
													</tr>

												</thead>
											
												<tbody>

													<?php
													 

													  $list_permissiongroup = array_filter($list_permissiongroup);

											    	  if (!empty($list_permissiongroup)) {
													   
													  $i = 1;	  											  
													  foreach ($list_permissiongroup as $permissiongroup_detail){
														  
														  if ($permissiongroup_detail['enable'] == '1'){ 
														  
														  	$txt_status = 'ENABLE'; 
														  	$txt_color = '#0EC952';
														  
														  }else{
															 
															$txt_status = 'DISABLE'; 
														  	$txt_color = '#FF0000'; 
															
														  }
												  
														 
													?>


													<tr>
														<td style="text-align:center;"><?php echo $i;?></td>
														<td><?php echo $permissiongroup_detail['name'];?></td>
														<td><?php echo '<span style="color:'.$txt_color.'">'.$txt_status.'</span>';?></td>
														
														<td>

														<button type="button" class='btn btn-xs btn-default' data-original-title='Edit' onclick="javascript:window.location='<?php echo base_url().'permissiongroup/manage/'.$permissiongroup_detail['spg_id'];?>';"><i class='fa fa-pencil'></i></button>

														<button type="button" class='btn btn-xs btn-default' data-original-title='Delete' onclick="javascript:if(confirm('คุณต้องการลบรายการนี้ใช่หรือไม่?')){ window.location='<?php echo base_url().'permissiongroup/delete/'.$permissiongroup_detail['spg_id'];?>'; }else{ return false; }"><i class='fa fa-trash-o'></i></button>
														</td>

													</tr>
													
													<?php $i++; } }else{ ?>
								                    <tr>
								                      	<td colspan="4" style="text-align:center;">Data Not Found.</td>
								                    </tr>
								                    <?php } ?>


													
												</tbody>

											</table>
										</div>
										<?php echo form_close();?>
									</div>
									<!-- end widget content -->


						</div>
						<p>&nbsp;</p>
									
						<!-- End widget div-->
					</div>

				</div>

				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
						
					<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">

						<div class="page-header">
									<h1>
										FORM PERMISSION GROUP
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
							<!-- end widget edit box -->

							<!-- widget content -->
							<div class="widget-body no-padding">
							<?php if($frmEdit==FALSE){ ?>
								<?php echo form_open('permissiongroup/add', array('id'=>'smart-form-register', 'class'=>'form-horizontal'));?>

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="form-field-2">  </label>

												<div class="col-xs-8 col-sm-8">
													<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_name" placeholder="Permission Group Name" class="width-100" />
																		<i class="ace-icon fa fa-unlock-alt"></i>
																	</span>
													
												</div>
										</div>
										<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="form-field-2">  </label>
												<div class="col-xs-10 col-sm-8">
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


									</div>
								</div>

									<div class="clearfix form-actions">
											<div class="col-md-offset-5 col-md-9">

												<button type="submit" class="btn btn-primary">
												Save
											</button>
											<input type="hidden" name="action" value="<?php echo base64_encode('addPermissionGroup');?>"  />

												<!-- &nbsp; &nbsp; &nbsp;
												<button class="btn" type="reset">
													<i class="ace-icon fa fa-undo bigger-110"></i>
													Reset
												</button> -->
											</div>
									</div>

								<?php echo form_close(); ?>

							<?php }else{// Form Edit ?>

								<?php echo form_open('permissiongroup/edit/'.$perDataEdit['spg_id'].'', array('id'=>'smart-form-register', 'class'=>'form-horizontal'));?>

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="form-field-2">  </label>

												<div class="col-xs-8 col-sm-8">
													<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_name" placeholder="Permission Group Name" value="<?php echo $perDataEdit['name']; ?>" class="width-100" />
																		<i class="ace-icon fa fa-unlock-alt"></i>
																	</span>
													
												</div>
										</div>
										<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="form-field-2">  </label>
												<div class="col-xs-10 col-sm-8">
													<div class="radio">
													Status
														<label>
															<input type="radio" name="rad_status" value="1" <?php if($perDataEdit['enable']=='1'){ echo 'checked="checked"';}else{ echo set_radio('rad_status', '1', TRUE); }?> class="ace" />
															<span class="lbl"> Enable </span>

															
														</label>

														<label>
															<input type="radio" name="rad_status" value="0" <?php if($perDataEdit['enable']=='0'){ echo 'checked="checked"';}else{ echo set_radio('rad_status', '0');}?> class="ace" />
															<span class="lbl"> Disable </span>

														</label>
													</div>

												
												</div>
											</div>


									</div>
								</div>

									<div class="clearfix form-actions">
											<div class="col-md-offset-5 col-md-9">

												<button type="submit" class="btn btn-primary">
												Save
											</button>
											<input type="hidden" name="action" value="<?php echo base64_encode('editPermissionGroup');?>"  />

												<!-- &nbsp; &nbsp; &nbsp;
												<button class="btn" type="reset">
													<i class="ace-icon fa fa-undo bigger-110"></i>
													Reset
												</button> -->
											</div>
									</div>


								<?php echo form_close(); ?>
							<?php } ?>
							</div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->


					</div>

				</div>
				<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->
		<p>&nbsp;</p>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse display">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>

		
		