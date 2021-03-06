
<!-- #MAIN PANEL -->
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
								<i class="ace-icon fa fa-user user-icon"></i>
								<a href="#">USER</a>
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
				
				<!-- row -->
				<div class="row" style="margin:0;padding:0;">
					
					<div class="col-sm-12 col-md-12 col-lg-10">

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
										EDIT USER FORM
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
									<?php if($strValid==FALSE){ echo validation_errors(); } ?>
					                <?php if($this->session->flashdata('msgResponse') != ''){ echo $this->session->flashdata('msgResponse'); }?> 
					           		<?php echo form_open('user/edit/'.$uid.'', array('id'=>'smart-form-register', 'class'=>'form-horizontal'));?>	

					           		<div class="row">
									<div class="col-xs-12">
										<form class="form-horizontal hide" id="validation-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-4">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Username" value="<?php echo $recLoadUser['username'];?>" style="background-color: #d7d7d7;" readonly class="width-100" />
																		<i class="ace-icon fa fa-user"></i>
																	</span>
																</div>
												<!-- </div> -->
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> New Password </label>

												<div class="col-xs-10 col-sm-4">
													<span class="block input-icon input-icon-right">
																		<input type="password" name="txt_pwd" placeholder="New Password" id="password" value="" class="width-100" />
																		<i class="ace-icon fa fa-lock"></i>
																	</span>
																	<div class="note">
														<strong>Reset Password :</strong> Please Fill in new password
													</div>
												
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Group </label>

												<div class="col-sm-9">

													<!-- <span class="help-inline col-xs-12 col-sm-9"> -->
													<label class="select">
													
													<?php
                                                            
								                        $optName = array();
								                        $optName['0'] = '-- Please Select Groups --';
								                        
								                        foreach($excLoadG->result() as $g){
								                            
								                            $optName[$g->sug_id] = $g->name;
								                            
								                            
								                        }
								                    
								                        $selected = ($recLoadUser['sug_id']) ? $recLoadUser['sug_id'] : '-- Please Select Groups --';
								                        if(form_error('sel_group')){ $setErrSel = "class='err'"; }
								                        echo form_dropdown('sel_group', $optName,  $selected, $setErrSel);


								                        ?>

						                            <i></i>
												 </label>
														<!-- </span> -->
												
												</div>

											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Firstname </label>

												<div class="col-xs-10 col-sm-4">
													<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_fname" placeholder="First name" value="<?php echo $recLoadUser['firstname'];?>" class="width-100" />
																		<!-- <i class="ace-icon fa fa-lock"></i> -->
																	</span>
												
												</div>
											</div>


											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Lastname </label>

												<div class="col-xs-10 col-sm-4">
													<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_lname" placeholder="Last name" value="<?php echo $recLoadUser['lastname'];?>" class="width-100" />
																		<!-- <i class="ace-icon fa fa-lock"></i> -->
																	</span>
													
												</div>
											</div>


											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sex </label>

												<div class="col-sm-9">
													<div class="radio">
														<label>
															<input checked="checked" type="radio" name="rad_sex" value="male" <?php if($recLoadUser['gender']=='male'){ echo 'checked="checked"';} ?> class="ace" />
															<span class="lbl"> Male </span>

															
														</label>

														<label>
															<input type="radio" name="rad_sex" value="female" <?php if($recLoadUser['gender']=='female'){ echo 'checked="checked"';} ?> class="ace" />
															<span class="lbl"> Female </span>

														</label>
													</div>

												
												</div>
											</div>

											<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email Address </label>

																<div class="col-xs-10 col-sm-4">
																	<div class="clearfix">
																	<span class="block input-icon input-icon-right">
																		<input name="txt_email" placeholder="E-mail" type="email" value="<?php echo $recLoadUser['email'];?>" class="width-100" />
																		<i class="ace-icon fa fa-envelope-o"></i>
																	</span>
													
												
																	</div>
																</div>
															</div>
										



								
										</div>
										</div>

										<div class="clearfix form-actions">
											<div class="col-md-offset-3 col-md-9">

												<button type="submit" class="btn btn-primary">
												Edit
											</button>
											<input type="hidden" name="action" value="<?php echo base64_encode('editUser');?>"  />

												<!-- &nbsp; &nbsp; &nbsp;
												<button class="btn" type="reset">
													<i class="ace-icon fa fa-undo bigger-110"></i>
													Reset
												</button> -->
											</div>
										</div>



										<!-- <footer>
											<button type="submit" class="btn btn-primary">
												Edit
											</button>
											<input type="hidden" name="action" value="<?php echo base64_encode('editUser');?>"  />
										</footer> -->

					           		<?php echo form_close();?>
									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->
						</div>

					</div>

				</div>
				<!-- end row -->	
			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->

			
		<!-- <script type="text/javascript">
			
			$(document).ready(function(){			

				var $registerForm = $("#smart-form-register").validate({
	
					// Rules for form validation
					rules : {
						txt_usr : {
							required : true,
							minlength : 4,
							maxlength : 16,
						},
						txt_email : {
							required : true,
							email : true
						},
						txt_pwd : {
							minlength : 4,
							maxlength : 16
						},
						
						txt_fname : {
							required : true
						},
						txt_lname : {
							required : true
						},
						
						
					},
		
					// Messages for form validation
					messages : {
						login : {
							required : 'Please enter your login'
						},
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						password : {
							required : 'Please enter your password'
						},
						passwordConfirm : {
							required : 'Please enter your password one more time',
							equalTo : 'Please enter the same password as above'
						},
						firstname : {
							required : 'Please select your first name'
						},
						lastname : {
							required : 'Please select your last name'
						},
						gender : {
							required : 'Please select your gender'
						},
						terms : {
							required : 'You must agree with Terms and Conditions'
						}
					},
		
					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});


			});

		</script> -->

		