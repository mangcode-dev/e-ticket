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
								<i class="ace-icon fa fa-file file-icon"></i>
								<a href="#">QUOTATION</a>
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

					<div class="col-sm-10 col-md-10 col-lg-10">
					<!-- <a href="#my-modal" role="button" class="bigger-125 bg-primary white" data-toggle="modal">
									&nbsp; Content Slider inside Modal Box &nbsp;
								</a> -->

					<div id="my-modal" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin">เลือกวิธีการกำหนดลูกค้า</h3>
											</div>

											<div class="modal-body">
												<label class="control-label no-padding-right" > โปรดเลือกวิธีการ </label>

												
													<div class="radio">
														<label>
															<input checked="checked" type="radio" name="rad_type" id="rad_type" value="manual"  class="ace" />
															<span class="lbl"> เพิ่มลูกค้าขึ้นใหม่ </span>
														</label>
															
														<label>
															<input type="radio" name="rad_type" id="rad_type" value="import" class="ace" />
															<span class="lbl"> Import จากระบบอื่น </span>
														</label>	
														
													</div>

												
												<br>
													<br>
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm btn-success pull-right" data-dismiss="modal" name="typerad" id="typerad">
													<i class="ace-icon glyphicon glyphicon-ok"></i>
													OK
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
					</div>

					<div id="my-modal2" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin"> เลือกระบบที่ต้องการค้นหาลูกค้า </h3>
											</div>

											<div class="modal-body">
												<label class="control-label no-padding-right" > กรุณาเลือกระบบที่ต้องการค้นหา </label>

												
												<div>
															<!-- <label for="form-field-select-1">Default</label> -->

															<select class="form-control" id="form-field-select-1">

																	 <option value="0">ค้นหาในระบบที่มีอยู่แล้ว</option>


																<?php
                                                            
											                        $optName = array();
											                        $optName['0'] = '-- Please Select Groups --';

											                        
											                        
											                        foreach($excLoadG->result() as $g){
											                            
											                            $optName[$g->trd_id] = $g->trd_name;
											                            ?>

											                         <option value="<?php echo $g->trd_id; ?>"><?php echo $g->trd_name; ?></option>

											                         <?php
											                        }
											                    
											                        // $selected = (set_value('sel_group')) ? set_value('sel_group') : '-- Please Select Groups --';
											                        // if(form_error('sel_group')){ $setErrSel = "class='err'"; }
											                        // echo form_dropdown('sel_group', $optName,  $selected, $setErrSel);


											                        ?>
											                        <i></i>
															</select>
														</div>
														<br>
													<label class="control-label no-padding-right" > กรุณาใส่คำที่ต้องการค้นหา </label>

													<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_search" id="txt_search" placeholder="ระบุคำที่ต้องการค้นหา" value="<?php echo set_value('txt_search'); ?>" class="width-100" />
																		<i class="ace-icon fa fa-search"></i>
																	</span>
													<br>
													<br>
													<br>
													<br>
												
											</div>

											<div class="modal-footer">

												<button class="btn btn-sm btn-danger " data-dismiss="modal" name="back2" id="back2">
													<i class="ace-icon fa fa-undo"></i>
													BACK
												</button>

												&nbsp; &nbsp; &nbsp;

												<button class="btn btn-sm btn-success pull-right " data-dismiss="modal" name="typeSystem" id="typeSystem" >
													<i class="ace-icon glyphicon glyphicon-ok"></i>
													OK &nbsp;&nbsp;
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
					</div>

					<div id="my-modal3" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin"> ข้อมูลลูกค้า </h3>
											</div>

											<div class="modal-body">
												<label class="control-label no-padding-right" > เลือกลูกค้า </label>

													<select class="form-control" id="custlist">

											                     
											                        <!-- <i></i> -->
													</select>

												
													<br>
													<br>
													<br>
												
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm btn-danger " data-dismiss="modal" name="back3" id="back3">
													<i class="ace-icon fa fa-undo"></i>
													BACK
												</button>

												&nbsp; &nbsp; &nbsp;

												<button class="btn btn-sm btn-success pull-right" data-dismiss="modal" name="selcust" id="selcust">
													<i class="ace-icon glyphicon glyphicon-ok"></i>
													OK &nbsp;&nbsp;
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
					</div>

					<div id="my-modal4" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin"> ข้อมูลลูกค้า </h3>
											</div>

											<div class="modal-body">
												<label class="control-label no-padding-right" > ไม่พบข้อมูลลูกค้า </label>

													
													<select class="form-control" id="custlist">

											                     
											                        <!-- <i></i> -->
													</select>
												
													<br>
													<br>
													<br>
												
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm btn-success pull-right" data-dismiss="modal" name="selcust" id="selcust">
													<i class="ace-icon glyphicon glyphicon-ok"></i>
													OK
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
					</div>

					<div id="my-modal5" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin">เพิ่มรายละเอียด</h3>
											</div>

											<div class="modal-body">
												<label class="control-label no-padding-right" > โปรดเลือกวิธีการ </label>

												
													<div class="radio">
														<label>
															<input checked="checked" type="radio" name="rad_type2" id="rad_type2" value="manual"  class="ace" />
															<span class="lbl"> เพิ่มรายละเอียดขึ้นใหม่ </span>

														</label>	
														<label>
														
														
															<input type="radio" name="rad_type2" id="rad_type3" value="import2" class="ace" />
															<span class="lbl"> Import จากระบบอื่น </span>

														</label>
													</div>

													<span class="block input-icon input-icon-right">
																		<input type="hidden" id="hid" name="hid" />
																		<!-- <i class="ace-icon fa fa-search"></i> -->
																	</span>
												
												<br>
													<br>
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm btn-success pull-right" data-dismiss="modal" name="desItemNew" id="desItemNew">
													<i class="ace-icon glyphicon glyphicon-ok"></i>
													OK
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
					</div>

					<div id="my-modal6" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin"> เพิ่มรายละเอียด </h3>
											</div>

											<div class="modal-body">
												
													<label class="control-label no-padding-right" > รายละเอียด </label>

													<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_desitemname" id="txt_desitemname" placeholder="ระบุรายละเอียด" class="width-100" />
																		<!-- <i class="ace-icon fa fa-search"></i> -->
																	</span>
													<br>

													<label class="control-label no-padding-right" > รายละเอียดเพิ่มเติม </label>

													<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_desitemdetail" id="txt_desitemdetail" placeholder="ระบุรายละเอียดเพิ่มเติม" class="width-100" />
																		<!-- <i class="ace-icon fa fa-search"></i> -->
																	</span>

													<br>
													<label class="control-label no-padding-right" > ราคา/หน่วย </label>

													<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_price" id="txt_price" placeholder="ระบุรายละเอียดเพิ่มเติม" class="width-100" />
																		<!-- <i class="ace-icon fa fa-search"></i> -->
																	</span>
													<br>
													<label class="control-label no-padding-right" > Status </label>

												
													<div class="radio">
														<div id="itemrad">
														<label>
															<input checked="checked" type="radio" name="rad_item" id="rad_item1" value="ena"  class="ace" />
															<span class="lbl"> Enable </span>

															
														</label>
														<!-- &nbsp; -->
														<label>
															<input type="radio" name="rad_item" id="rad_item2" value="dis" class="ace" />
															<span class="lbl"> Disable </span>

														</label>
														</div>
													</div>

													<br>
													

													<br>
												
											</div>

											<div class="modal-footer">

												<button class="btn btn-sm btn-danger " data-dismiss="modal" name="backtonewitem" id="backtonewitem">
													<i class="ace-icon fa fa-undo"></i>
													BACK
												</button>

												&nbsp; &nbsp; &nbsp;

												<button class="btn btn-sm btn-success pull-right " data-dismiss="modal" name="additemdes" id="additemdes" >
													<i class="ace-icon glyphicon glyphicon-ok"></i>
													OK &nbsp;&nbsp;
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
					</div>



					<div class="col-sm-5 col-md-5 col-lg-6">
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
										QUOTATION HEADER
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
							<?php echo form_open('quotation/edit/'.$qid.'', array('id'=>'smart-form-register', 'class'=>'form-horizontal'));?>	
								<div class="row">
									<div class="col-xs-12">
										<form class="form-horizontal hide" id="validation-form" method="get">
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quotation No. </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Quotation no."    class="width-100" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> วันที่เริ่มสัญญา </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="วันที่เริ่มสัญญา"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> วันที่หมดสัญญา </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="วันที่หมดสัญญา"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>


											<!-- <div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quotation ใหม่ </label>
												<div class="radio">
												
												<div class="col-xs-10 col-sm-9">
														<label>
															<input  type="radio" name="rad_status" value="1" id="rad_status1" class="ace" />
															<span class="lbl"> มี </span>

															
														</label>


														<label>
															<input checked="checked" type="radio" id="rad_status2" name="rad_status" value="0"  class="ace" />
															<span class="lbl"> ไม่มี </span>

														</label>
														</div>
													</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> เลขที่ Quotation ใหม่ </label>

												<!-- <div class="col-sm-9 "> -->
														<!-- <div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="quotation_new_no" id="quotation_new_no" placeholder="เลขที่ Quotation ใหม่"    class="width-100" disabled/>
																		
																	</span>
																</div>
												
											</div>  -->

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> สถานะ </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="สถานะ"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>


											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Comment </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Comment"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>

											
										</form>
											
									</div>

								</div>

											<!-- <div class="clearfix form-actions">
												<div class="center">

													<button type="submit" class="btn btn-primary">
													Edit
												</button>
												<input type="hidden" name="action" value="<?php echo base64_encode('editQuatation');?>"  /> -->

													<!-- &nbsp; &nbsp; &nbsp;
													<button class="btn" type="reset">
														<i class="ace-icon fa fa-undo bigger-110"></i>
														Reset
													</button> -->
												<!-- </div>
											</div> -->


								<?php echo form_close(); ?>

							</div>


								</div>
						</div>
						
					</div>

					<div class="col-sm-5 col-md-5 col-lg-6">
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
										CUSTOMER INFORMATION
										<!-- <small>
											<i class="ace-icon fa fa-angle-double-right"></i>
											Common form elements and layouts
										</small> -->
									</h1>
								</div>

								<!-- widget div-->
								<!-- <div> -->

									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										
									</div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body no-padding">
									<?php if($strValid==FALSE){ echo validation_errors(); } ?>
					                <?php if($this->session->flashdata('msgResponse') != ''){ echo $this->session->flashdata('msgResponse'); }?> 
					           		<?php echo form_open('quotation/edit/'.$qid.'', array('id'=>'smart-form-register', 'class'=>'form-horizontal'));?>	

					           		<div class="row">
									<div class="col-xs-12">
										<form class="form-horizontal hide" id="validation-form" method="get">
											<!-- <div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> รหัสลูกค้า </label>
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Customer Code"    class="width-100" />
																	</span>
																</div>
											</div> -->

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อลูกค้า </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_cust" id="txt_cust" placeholder="Customer Name"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>

											<!-- <div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ติดต่อ </label>
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Contact"    class="width-100" />
																	</span>
																</div>
											</div> -->

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ที่อยู่ </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<textarea class="form-control" id="custAddress" name="custAddress" placeholder="Address" rows="4"  ></textarea>



																	<!-- <span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Address"    class="width-100" />
																		<i class="ace-icon fa fa-home"></i>
																	</span> -->
																</div>
												<!-- </div> -->
											</div>

											
											<!-- <div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> โทรศัพท์ </label>
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Telephone"    class="width-100" />
																	</span>
																</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> แฟกซ์ </label>
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Fax"    class="width-100" />
																	</span>
																</div>
											</div> -->



									</form>
										</div>

										</div>
										

										<!-- <div class="clearfix form-actions">
											<div class="col-md-offset-5 col-md-12">

												<button type="submit" class="btn btn-primary">
												Edit
											</button>
											<input type="hidden" name="action" value="<?php echo base64_encode('editQuatation');?>"  />
											</div>
										</div> -->



										<!-- <footer>
											<button type="submit" class="btn btn-primary">
												Edit
											</button>
											<input type="hidden" name="action" value="<?php echo base64_encode('editUser');?>"  />
										</footer> -->

					           		<?php echo form_close();?>
									</div>
									<!-- end widget content -->

								<!-- </div> -->
								<!-- end widget div -->
						</div>
						
					</div>

					<div class="col-sm-5 col-md-5 col-lg-12">

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
										QUOTATION DETAIL
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

										
										


										<table class="table table-striped table-bordered table-hover" width="100%" id="myTable">

											<thead>	
													                
												<tr>
													<th></th>
													<th style="text-align:center;">No</th>
													<th data-class="expand" style="text-align:center;">
													<!-- <i class="fa fa-fw fa-group text-muted hidden-md hidden-sm hidden-xs"></i> -->
													 รายละเอียด
													 </th>
													<th style="text-align:center;">จำนวนหน่วย</th>
													<th data-hide="phone,tablet" style="text-align:center;">ราคาต่อหน่วย (บาท)</th>
													<th style="text-align:center;">ทั้งหมด</th>
													<th style="text-align:center;">จำนวนวัน</th>
													<th style="text-align:center;">ค่าบริการสุทธิ (บาท)</th>
												</tr>

											</thead>
										
											<tbody>
												<?php 
													$num = 10;
													for ($i=0; $i < $num; $i++) { 

													}
												?>

												<tr id="tr1">
													<td class="hidden-480" style="text-align:center;" width="10%">
														<!-- <span class="vbar"></span> -->

																		<button class='btn btn-minier btn-danger btn-sm ' onclick="myFunction(1)" ><i class='ace-icon fa fa-trash-o bigger-30' ></i>ลบรายการ</button>
													</td>
													<td style="text-align:center;">
														1
													</td>
													<td style="text-align:center;" width="30%" >
													<!-- <div> -->
														<select class="chosen-select form-control" id="des1" data-placeholder="Choose a State..." style="text-align-last:center;" onchange="changeFunc(this.id);">
																<option value="0" >  -- กรุณาเลือกรายระเอียด --  </option>

																<?php
                                                            
											                        $optName1 = array();
											                        $optName1['0'] = '-- Please Select Groups --';

											                        
											                        
											                        foreach($excLoadQuotation->result() as $s){
											                            
											                            $optName1[$s->qd_id] = $s->qd_name;
											                            ?>

											                         <option value="<?php echo $s->qd_id; ?>"><?php echo $s->qd_name; ?></option>

											                         <?php
											                        }
											                    
											                        // $selected = (set_value('sel_group')) ? set_value('sel_group') : '-- Please Select Groups --';
											                        // if(form_error('sel_group')){ $setErrSel = "class='err'"; }
											                        // echo form_dropdown('sel_group', $optName,  $selected, $setErrSel);


											                        ?>
											                        <option value="500" >  -- เพิ่มรายละเอียดขึ้นใหม่ --  </option>
											                        <i></i>


															</select>
															<!-- </div> -->
													</td>
													<td style="text-align:center;" width="7%">
														<span class="block input-icon input-icon-right">
																		<input type="text" name="quantity1" id="quantity1" placeholder=""  onkeyup="sumtotal(this.id)"  class="width-100" style="text-align-last:right;"/>
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
													</td>
													<td style="text-align:center;" width="15%">
														<span class="block input-icon input-icon-right">
																		<input type="text" name="price1" id="price1" placeholder=""    class="width-100" style="text-align-last:right;" readonly="" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
													</td>
													<td style="text-align:center;" width="15%">
														<span class="block input-icon input-icon-right">
																		<input type="text" name="total1" id="total1" placeholder=""    class="width-100" style="text-align-last:right;" readonly />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
													</td>
													<td style="text-align:center;" width="7%">
														<span class="block input-icon input-icon-right">
																		<input type="text" name="unit1" id="unit1" placeholder=""    class="width-100" onkeyup="sumtotalall(this.id)" style="text-align-last:right;"/>
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
													</td>
													<td style="text-align:center;" width="15%">
														<span class="block input-icon input-icon-right">
																		<input type="text" name="totalall1" id="totalall1" placeholder=""    class="width-100" style="text-align-last:right;" readonly="" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
													</td>

													<!-- <td style="text-align:center;"><?php echo $i;?></td>
													<td><?php echo $usergroup_detail['name'];?></td>
													
													<td><?php echo '<span style="color:'.$txt_color.'">'.$txt_status.'</span>';?></td>
													
													<td>

													<button type="button" class='btn btn-xs btn-default' data-original-title='Edit' onclick="javascript:window.location='<?php echo base_url().'usergroup/manage/'.$usergroup_detail['sug_id'];?>';"><i class='fa fa-pencil'></i></button>

													<button type="button" class='btn btn-xs btn-default' data-original-title='Delete' onclick="javascript:if(confirm('คุณต้องการลบรายการนี้ใช่หรือไม่?')){ window.location='<?php echo base_url().'usergroup/delete/'.$usergroup_detail['sug_id'];?>'; }else{ return false; }"><i class='fa fa-trash-o'></i></button>
													</td> -->

												</tr>


													
												

												<tr>
													<td colspan="6" style="text-align:center;">
														<button class="btn btn-minier btn-success" name="additem" id="additem">
															<i class="ace-icon glyphicon glyphicon-plus"></i>
															เพิ่มรายการ
														</button>

														


													</td>
													<td style="text-align:center;" bgcolor="#FFF8DC">Total Price</td>
													<td style="text-align:center;" bgcolor="#FFF8DC" id="totalPrice">
												
													</td>

												</tr>
												<tr >
													<td colspan="6"></td>
													<td style="text-align:center;" bgcolor="#FFF8DC">Vat 7%</td>
													<td style="text-align:center;" bgcolor="#FFF8DC">
													
													20000
													<!-- <i class="ace-icon fa fa-arrow-up"></i> -->
													
												</td>

												</tr>
												<tr>
													<td colspan="6"></td>
													<td style="text-align:center;" bgcolor="#FFF8DC">Grand Price</td>
													<td style="text-align:center;" bgcolor="#FFF8DC">
														
													20
													<!-- <i class="ace-icon fa fa-arrow-up"></i> -->
													
													</td>

												</tr>
												
											</tbody>

										</table>
										<!-- <?php echo form_close();?> -->
									</div>




								</div>
						</div>
					</div>
			

				

					</div>

					<!-- END COL10 -->

				</div>



				
				<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->
		<p>&nbsp;</p>

		<script type="text/javascript">
			$("#rad_status1").click(function () {     
				// var inputElementsad =	document.getElementById("rad_status2").checked;

				document.getElementById("quotation_new_no").disabled = false;

		    });
		</script>

		<script type="text/javascript">
			$("#rad_status2").click(function () {     
				// var inputElementsad =	document.getElementById("rad_status2").checked;

				document.getElementById("quotation_new_no").disabled = true;
				$('#quotation_new_no').val("");
		    });
		</script>



		<script type="text/javascript">
		    $(window).load(function(){
		        $('#my-modal').modal('show');
		    });
		</script>

		<script type="text/javascript">
			$("#typerad").click(function () {     
				var inputElements =	document.getElementById("rad_type").checked;

				if (inputElements === false) { 
					$('#my-modal2').modal('show');
				}

		    });
		</script>

		<script type="text/javascript">
			$("#back2").click(function () {     
				var inputElements =	document.getElementById("rad_type").checked;

				if (inputElements === false) { 

					$('#my-modal').modal('show');
				}

		    });
		</script>

		<script type="text/javascript">
			$("#back3").click(function () {     
				var inputElements =	document.getElementById("rad_type").checked;

				if (inputElements === false) { 
					$('#custlist').html('');
					$('#my-modal2').modal('show');
				}

		    });
		</script>


		<script type="text/javascript">
				// var inputElements2 =	document.getElementById("form-field-select-1").value;
				$("#typeSystem").click(function () {     

				var sel_system =	document.getElementById("form-field-select-1").value;
				var txtSearch =	document.getElementById("txt_search").value;
				// alert(inputElements2);
				// alert(inputElements3);
				// console.log(inputElements2);
				// console.log(inputElements3);
				$.ajax({
					type:"POST",
					url:"<?php echo base_url() . 'apicust/searchCust/'   ;?> ",
					data: {sel_system: sel_system , txtSearch: txtSearch},
					success:function(data) {
							console.log(data);
							// $('.error').text(data);
							// $('#txt_ans').text(data);
							 // alert("เพิ่มผู้รับผิดชอบในระบบแล้วค่ะ");
							 // data = JSON.parse(data);
							  $('#my-modal3').modal('show');
									    // alert("What follows is not blank: " + data);
									    $.each(data, function(i, data) {
									          // $('#custlist')
							         			// .append($("<option></option>").attr("data",i).text(data)); 
							         			$('#custlist')
							         			.append($("<option></option>").attr("data",i).text(data)); 
							         			// $('#custlist').append('<option value=' + data[i] + '>' + data[i] + '</option>');
									    });
					},
				    error: function() {
				        alert("ขออภัยค่ะไม่พบข้อมูลลูกค้า กรุณาทำการตรวจสอบอีกครั้งค่ะ");

				        window.location.replace("<?php echo base_url() . 'quotation/add/'   ;?> ")
				    }
				});



				// var inputElements =	document.getElementById("rad_type").checked;

				// if (inputElements === false) { 
				// 	$('#my-modal2').modal('show');
				// }

		    });

		</script>

		<script type="text/javascript">
				// var inputElements2 =	document.getElementById("form-field-select-1").value;
				$("#selcust").click(function () {     

				// var sel_system =	document.getElementById("form-field-select-1").value;
				var custlist =	document.getElementById("custlist").value;
				// console.log(custlist);
				$('#txt_cust').val(custlist);
				$.ajax({
					type:"POST",
					url:"<?php echo base_url() . 'quotation/getDetailCust/'   ;?> ",
					data: {custlist: custlist},
					success:function(data) {
							console.log(data);

							if (data=='') {
								$('#custAddress').val(" *** ไม่พบข้อมูลที่อยู่ลูกค้า *** ");
							}else{
								$('#custAddress').val(data);
							}
					}
				});

		    });

		</script>

		<script type="text/javascript">
				// var inputElements2 =	document.getElementById("form-field-select-1").value;
			$("#desItemNew").click(function () {     

				// var sel_system =	document.getElementById("form-field-select-1").value;
				var custlist =	document.getElementById("custlist").value;
				// console.log(custlist);
				if (document.getElementById('rad_type2').checked)
				   {
				    	sel_status = document.getElementById('rad_type2').value;
				    	$('#my-modal6').modal('show');
				}else{
				   		sel_status = document.getElementById('rad_item2').value;

				}


				
				
		    });

			$("#backtonewitem").click(function () {     

				$('#my-modal5').modal('show');
				
		    });

		    $("#additemdes").click(function () {     
		    	
		    	var hid = document.getElementById('hid').value;
				$('#des'+hid).html('');

				var desitemname =	document.getElementById("txt_desitemname").value;
				var desitemdetail =	document.getElementById("txt_desitemdetail").value;
				var txt_price =	document.getElementById("txt_price").value;
				if (document.getElementById('rad_item1').checked)
				   {
				    	sel_status = document.getElementById('rad_item1').value;
				}else{
				   		sel_status = document.getElementById('rad_item2').value;
				}

				$.ajax({
					type:"POST",
					url:"<?php echo base_url() . 'apiadddescription/addItemDescription/'   ;?> ",
					data: {desitemname: desitemname , desitemdetail: desitemdetail , sel_status: sel_status , txt_price: txt_price },
					success:function(data) {
							console.log(data);
							alert("เพิ่มรายละเอียดเรียบร้อยแล้วค่ะ");


							$.each(data, function(i, data) {
									          // $('#custlist')
							         			// .append($("<option></option>").attr("data",i).text(data)); 
							         			$('#des'+hid)
							         			.append($("<option></option>").attr("value",i).text(data)); 
							         			// $('#custlist').append('<option value=' + data[i] + '>' + data[i] + '</option>');
									    });
					}
				});

				
		    });

		</script>

		<script type="text/javascript">
			$("#additem").click(function () {   
				// var str = '123';
				var table = document.getElementById("myTable");
				

				// console.log(table.rows.length-3);
				var no = table.rows.length-3;
			    var row = table.insertRow(1+(no-1));
			    // var newRow = theTable.insertRow(theTable.rows.length)
			    row.id = "tr"+no;

			    var row_id = $(this).closest('tr').index()
			    if (row_id==no) {
			    	// alert("null");
			    }else{
			    	// alert("not null");
			    }
			    // console.log(no);
			    // console.log(row_id);
			    var idOfElement = table.getAttribute('id');
			    console.log(idOfElement);

			    var cell1 = row.insertCell(0);
			    var cell2 = row.insertCell(1);
			    var cell3 = row.insertCell(2);
			    var cell4 = row.insertCell(3);
			    var cell5 = row.insertCell(4);
			    var cell6 = row.insertCell(5);
			    var cell7 = row.insertCell(6);
			    var cell8 = row.insertCell(7);
			    cell1.style.cssText = 'text-align:center;';
			    cell2.style.cssText = 'text-align:center;';
			    cell3.style.cssText = 'text-align:center;';
			    cell4.style.cssText = 'text-align:center;';
			    cell5.style.cssText = 'text-align:center;';
			    cell6.style.cssText = 'text-align:center;';
			    cell7.style.cssText = 'text-align:center;';
			    cell8.style.cssText = 'text-align:center;';

			    var test = "<div class='saved' >"+"<div >test.test</div> <div class='remove'>[Remove]</div></div>";
			    var test1 = "<button class='btn btn-minier btn-danger btn-sm' onclick='myFunction("+no+")'><i class='ace-icon fa fa-trash-o bigger-30 '></i>ลบรายการ</button>";
			    var des = "<select class='chosen-select form-control' id='des"+no+"' data-placeholder='Choose a State...' style='text-align-last:center;' onchange='changeFunc(this.id);'><option value='0' >  -- กรุณาเลือกรายระเอียด --  </option><?php
                                                            
											                        $optName1 = array();
											                        $optName1['0'] = '-- Please Select Groups --';

											                        foreach($excLoadQuotation->result() as $s){
											                            
											                            $optName1[$s->qd_id] = $s->qd_name;
											                            ?><option value='<?php echo $s->qd_id; ?>'><?php echo $s->qd_name; ?></option><?php
											                        }
											                        ?> <option value='500' >  -- เพิ่มรายละเอียดขึ้นใหม่ --  </option><i></i></select>";

				var quantity = "<span class='block input-icon input-icon-right'><input type='text' name='quantity"+no+"' id='quantity"+no+"'  onkeyup='sumtotal(this.id)'  class='width-100' style='text-align-last:right;'/></span>";

				var price = "<span class='block input-icon input-icon-right'><input type='text' name='price"+no+"' id='price"+no+"' 	class='width-100' style='text-align-last:right;' readonly /></span>";
				var total = "<span class='block input-icon input-icon-right'><input type='text' name='total"+no+"' id='total"+no+"' class='width-100' style='text-align-last:right;' readonly /></span>";
				var unit = "<span class='block input-icon input-icon-right'><input type='text' name='unit"+no+"' id='unit"+no+"' class='width-100' onkeyup='sumtotalall(this.id)' style='text-align-last:right;' /></span>";
				var totalall = "<span class='block input-icon input-icon-right'><input type='text' name='totalall"+no+"' id='totalall"+no+"' class='width-100' style='text-align-last:right;' readonly /></span>";

			    cell1.innerHTML = test1;
			    cell2.id = no;
			    cell2.innerHTML = no;
			    cell3.innerHTML = des;
			    cell4.innerHTML = quantity;
			    cell5.innerHTML = price;
			    cell6.innerHTML = total;
			    cell7.innerHTML = unit;
			    cell8.innerHTML = totalall;

		    });


		  function myFunction($ino) {
		  	try{

		  		var row = document.getElementById("tr"+$ino);
    			row.parentNode.removeChild(row);

   				 // console.log(table);


				// alert($ino);
				// var table = document.getElementById($ino).innerText;
				// console.log($ino);
				// document.getElementById("myTable").deleteRow("2");

				// var rows = document.getElementById("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
				// console.log(rows);

				// var temp = rows-4;

				// var table = document.getElementById("myTable");
			 //    var temp = table.rows.length-4;
				
			 //    console.log(temp);

			    
			 //    if (temp<=1) {
			    	
			 //    	alert("Cannot delete all the rows.");
			 //    	// break;
			 //    }else{
			    	
			 //    	// cell2.innerHTML = no+1;
			   		 
			 //    }
			    
			    
			    
			    
			    // console.log(table.rows.length-4);

			    
			}catch(e) {
				alert(e);
			}
			}
				

		</script>
		<!-- <button class="btn btn-white btn-warning btn-bold">
												<i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
												Delete
											</button> -->



		<script type="text/javascript">

		</script>

		  <script type="text/javascript">

		   function changeFunc($id) {
		    var selectBox = document.getElementById($id);
		    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
		    var id = $id.substring(3, 4);
		    var txt_select = $("#des"+id+" option:selected").text();
		    
		    // console.log(res3);

		    document.getElementById("quantity"+id).value = "";
		    document.getElementById("price"+id).value = "";
		    document.getElementById("total"+id).value = "";
		    document.getElementById("unit"+id).value = "";
		    document.getElementById("totalall"+id).value = "";

		    if (selectedValue==500) {
		    	$('#my-modal5').modal('show');

		    	document.getElementById("hid").value = id;

		    }else{
		    	$.ajax({
					type:"POST",
					url:"<?php echo base_url() . 'quotation/selprice/'   ;?> ",
					data: {selectedValue: selectedValue , txt_select: txt_select },
					success:function(data) {
							var str = 'price';
							var res = str + id;
							console.log(res);
							document.getElementById(res).value = data;

					}
				});
		    }
		    
		   }

		  </script>

		  <script type="text/javascript">

		   function sumtotal($id) {

		   		 

			   	var id = $id.substring(8, 9);
			   	var total = document.getElementById("quantity"+id).value;
			   	// alert("s");
		   		var selectBox = document.getElementById($id);
		   		
		   		// console.log(id);
		   		var price = document.getElementById("price"+id).value;




		   		 if(isNaN(total)==true)
					 {
						alert('Please input Number only.');

						document.getElementById("quantity"+id).value = "";
					    // document.getElementById("price"+id).value = "";
					    document.getElementById("total"+id).value = "";
					    document.getElementById("unit"+id).value = "";
					    document.getElementById("totalall"+id).value = "";

					 }

		   		console.log(total);
		   		var sum = price*total;
		   		console.log(sum);

		   		sum = sum.toFixed(2);

		   		var unit = document.getElementById("unit"+id).value;
		   		var sumall = total*unit;

		   		sumall = sumall.toFixed(2);
		   		var str = document.getElementById("total"+id).value;

		   		document.getElementById("total"+id).value = sum;
		   		document.getElementById("totalall"+id).value = sumall;

		   }


		   function sumtotalall($id) {

		   		 

			   	var id = $id.substring(4, 5);
			   	// console.log(id);
			   	var unit = document.getElementById("unit"+id).value;
			   	// alert("s");
			   	if(isNaN(unit)==true)
					 {
						alert('Please input Number only.');

						// document.getElementById("quantity"+id).value = "";
					    // document.getElementById("price"+id).value = "";
					    // document.getElementById("total"+id).value = "";
					    document.getElementById("unit"+id).value = "";
					    document.getElementById("totalall"+id).value = "";

					 }

				var total = document.getElementById("total"+id).value;
				var sumall = total*unit;
				sumall = sumall.toFixed(2);
				document.getElementById("totalall"+id).value = sumall;

		   }



		   </script>




																		<!-- <a href="#" class="red">
																			<i class="ace-icon fa fa-trash-o bigger-130"></i>
																		</a> -->
															

		<!-- <script type="text/javascript">
			$('.additem').click(function(){
			   var row = $(this).closest('tr').clone();
			   row.find('input').val('');
			   $(this).closest('tr').after(row);
			   $('input[type="button"]', row).removeClass('additem').addClass('RemoveRow').val('Remove item');
			});

			$('table').on('click', '.RemoveRow', function(){
			  $(this).closest('tr').remove();
			});


		</script> -->

		


























