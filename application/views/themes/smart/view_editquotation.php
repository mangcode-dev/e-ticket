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
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> รหัสลูกค้า </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Customer Code"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อลูกค้า </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Customer Name"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ติดต่อ </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Contact"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-phone"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ที่อยู่ </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<textarea class="form-control" id="form-field-1" placeholder="Address" rows="4"  ></textarea>



																	<!-- <span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Address"    class="width-100" />
																		<i class="ace-icon fa fa-home"></i>
																	</span> -->
																</div>
												<!-- </div> -->
											</div>

											
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> โทรศัพท์ </label>
												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Telephone"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-phone"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> แฟกซ์ </label>
												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="Fax"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-phone"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>



									</form>
										</div>

										</div>
										

										<div class="clearfix form-actions">
											<div class="col-md-offset-5 col-md-12">

												<button type="submit" class="btn btn-primary">
												Edit
											</button>
											<input type="hidden" name="action" value="<?php echo base64_encode('editQuatation');?>"  />

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

								<!-- </div> -->
								<!-- end widget div -->
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
																		<input type="text" name="txt_usr" placeholder="Customer Code"    class="width-100" />
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


											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quotation ใหม่ </label>
												<div class="radio">
												
												<div class="col-xs-10 col-sm-9">
														<label>
															<input checked="checked" type="radio" name="rad_status" value="1"  class="ace" />
															<span class="lbl"> มี </span>

															
														</label>


														<label>
															<input type="radio" name="rad_status" value="0"  class="ace" />
															<span class="lbl"> ไม่มี </span>

														</label>
														</div>
													</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> เลขที่ Quotation ใหม่ </label>

												<!-- <div class="col-sm-9 "> -->
														<div class="col-xs-10 col-sm-9">
																	<span class="block input-icon input-icon-right">
																		<input type="text" name="txt_usr" placeholder="เลขที่ Quotation ใหม่"    class="width-100" />
																		<!-- <i class="ace-icon fa fa-user"></i> -->
																	</span>
																</div>
												<!-- </div> -->
											</div>

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

											<div class="clearfix form-actions">
												<div class="center">

													<button type="submit" class="btn btn-primary">
													Edit
												</button>
												<input type="hidden" name="action" value="<?php echo base64_encode('editQuatation');?>"  />

													<!-- &nbsp; &nbsp; &nbsp;
													<button class="btn" type="reset">
														<i class="ace-icon fa fa-undo bigger-110"></i>
														Reset
													</button> -->
												</div>
											</div>


								<?php echo form_close(); ?>

							</div>


								</div>
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
										<?php echo form_open('#', array('id' => 'frm_usergroupmanagement', 'name'=>'frm_usergroupmanagement'));?>
										


										<table class="table table-striped table-bordered table-hover" width="100%">

											<thead>	
													                
												<tr>
													<th></th>
													<th style="text-align:center;">No</th>
													<th data-class="expand" style="text-align:center;">
													<!-- <i class="fa fa-fw fa-group text-muted hidden-md hidden-sm hidden-xs"></i> -->
													 รายละเอียด
													 </th>
													<th style="text-align:center;">จำนวน</th>
													<th data-hide="phone,tablet" style="text-align:center;">ราคา</th>
													<th style="text-align:center;">ทั้งหมด</th>
													<th style="text-align:center;">หน่วย</th>
													<th style="text-align:center;">รวมราคา</th>
												</tr>

											</thead>
										
											<tbody>

												<tr>
													<td class="hidden-480" style="text-align:center;">
														<span class="vbar"></span>

																		<a href="#" class="red">
																			<i class="ace-icon fa fa-trash-o bigger-130"></i>
																		</a>
													</td>
													<td style="text-align:center;">
														1
													</td>
													<td style="text-align:center;">
														descrip
													</td>
													<td style="text-align:center;">
														2
													</td>
													<td style="text-align:center;">
														1000
													</td>
													<td style="text-align:center;">
														2
													</td>
													<td style="text-align:center;">
														200
													</td>
													<td style="text-align:center;">
														200
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
													<td colspan="6"></td>
													<td style="text-align:center;" bgcolor="#FFF8DC">Total Price</td>
													<td style="text-align:center;" bgcolor="#FFF8DC">
														
													20
													<!-- <i class="ace-icon fa fa-arrow-up"></i> -->
													
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
										<?php echo form_close();?>
									</div>




								</div>
						</div>
					</div>
			

				

					</div>

				</div>



				
				<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->
		<p>&nbsp;</p>


		






















