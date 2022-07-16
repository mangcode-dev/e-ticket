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
										MANAGE QUOTATION
										<!-- <small>
											<i class="ace-icon fa fa-angle-double-right"></i>
											Common form elements and layouts
										</small> -->
									</h1>
								</div>


								<div class="row" style="margin: 0px;padding: 0px;">
									<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
										
									</div>
									<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
										
									</div>
								</div>

								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<?php if ($this->session->flashdata('msgResponse') != ''){ echo $this->session->flashdata('msgResponse'); } ?>
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
					              
					                <?php echo form_open('#', array('id' => 'frm_usermanagement', 'name'=>'frm_usermanagement', 'class'=>'form-horizontal'));?>
										
					           		<div class="row">
									<div class="col-xs-12">
									

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div class="table-header">
											List Quotations
										</div>	
										<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
								                    	<td colspan="9">
									                    	<div id="btn_enable" class="btn btn-sm btn-success"><span class="fa fa-check-square-o"></span></div>
									                    	<div id="btn_disable" class="btn btn-sm btn-danger"><span class="fa fa-times"></span></div>
									                    	<div id="btn_delete" class="btn btn-sm btn-primary"><span class="fa fa-trash-o"></span></div>
								                    	</td>
								                    </tr>	
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th style="text-align:center;">
															<i class="ace-icon fa fa-file bigger-110 hidden-480"></i>
															Quotation No.
														</th>
														<th style="text-align:center;">
														<i class="ace-icon fa fa-user bigger-110 hidden-480"></i>
														Customer Name</th>
														<!-- <th>Name</th> -->
														<!-- <th class="hidden-480" style="text-align:center;">Group</th> -->
														<th class="hidden-480" style="text-align:center;">Status</th>

														<th style="text-align:center;">
															<i class="ace-icon fa fa-calendar bigger-110 hidden-480"></i>
															Date Created
														</th>
														<th style="text-align:center;">
															<i class="ace-icon fa fa-calendar bigger-110 hidden-480"></i>
															Last Updated
														</th>
														

														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												
												<?php
												 

												  $list_quo = array_filter($list_quo);

										    	  if (!empty($list_quo)) {
													  											  
												  foreach ($list_quo as $quo_detail){
													  
													 //  if ($quo_detail['enable'] == '1'){ 
													  
													 //  	$txt_status = 'ENABLE'; 
													 //  	$txt_color = '#0EC952';
													  
													 //  }else{
														 
														// $txt_status = 'DISABLE'; 
													 //  	$txt_color = '#FF0000'; 
														
													 //  }
											  
													 
												?>


												<tr>
													<td style="text-align:center;">
														<label class="pos-rel">
																<input type="checkbox" class="ace" name="chk_uid[]" value="<?php echo $quo_detail['qu_id'];?>"/>
																<span class="lbl"></span>
															</label>
													<!-- <input class="checkbox_uid" type="checkbox" name="chk_uid[]" value="<?php echo $quo_detail['qu_id'];?>"> -->
													</td>
													<td style="text-align:center;"><?php echo $quo_detail['qt_no'];?></td>
													<!-- <td><?php echo base64_decode($quo_detail['password']);?></td> -->
													
												
													<td style="text-align:center;"><?php echo $quo_detail['cust_id'];?></td>
													<td style="text-align:center;"><?php echo $quo_detail['qt_s_id'];?></td>
													<!-- <td style="text-align:center;"><?php echo '<span style="color:'.$txt_color.'">'.$txt_status.'</span>';?></td> -->
													<td style="text-align:center;"> <?php echo date('Y-m-d H:i:s', strtotime($quo_detail['qt_created']));?></td>
													<td style="text-align:center;"> <?php echo date('Y-m-d H:i:s', strtotime($quo_detail['qt_updated']));?></td>
													<td>

													<button type="button" class='btn btn-xs btn-default' data-original-title='Edit' onclick="javascript:window.location='<?php echo base_url().'quotation/edit/'.$quo_detail['qu_id'];?>';"><i class='fa fa-pencil'></i></button>

													<button type="button" class='btn btn-xs btn-default' data-original-title='Rule' onclick="javascript:window.location='<?php echo base_url().'user/rule/'.$quo_detail['qu_id'];?>';"><i class='fa fa-key'></i></button>
														
													<?php

														if($quo_detail['enable'] == 1){
													?>
															<button type="button" class='btn btn-xs btn-default' data-original-title='Disable' onclick="javascript:window.location='<?php echo base_url().'user/disable/'.$quo_detail['qu_id'];?>';"><i class='fa fa-times'></i></button>

													<?php }else{ ?>

														<button type="button" class='btn btn-xs btn-default' data-original-title='Enable' onclick="javascript:window.location='<?php echo base_url().'user/enable/'.$quo_detail['qu_id'];?>';"><i class='fa fa-check-square-o'></i></button>

													<?php } ?>

														<button type="button" class='btn btn-xs btn-default' data-original-title='Delete' onclick="javascript:if(confirm('คุณต้องการลบรายการนี้ใช่หรือไม่?')){ window.location='<?php echo base_url().'user/delete/'.$quo_detail['qu_id'];?>'; }else{ return false; }"><i class='fa fa-trash-o'></i></button>
													</td>

												</tr>
												
												<?php } }else{ ?>
							                    <tr>
							                      	<td colspan="9" style="text-align:center;">Data Not Found.</td>
							                    </tr>
							                    <?php } ?>


												
											</tbody>

										</table>

										
										
					           		<?php echo form_close();?>
									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->
						</div>

					</div>

				</div>

				
				<!-- col -->
				<div class="row" style="margin: 0px;padding: 0px;">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						
					</div>
				</div>
				<!-- end col -->
				

			


			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->

		




		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					// "aoColumns": [
					//   { "bSortable": false },
					//   null, null,null, null, null,
					//   { "bSortable": false }
					// ],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );



			
				
				
				// $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				// new $.fn.dataTable.Buttons( myTable, {
				// 	buttons: [
				// 	  {
				// 		"extend": "colvis",
				// 		"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
				// 		"className": "btn btn-white btn-primary btn-bold",
				// 		columns: ':not(:first):not(:last)'
				// 	  },
				// 	  {
				// 		"extend": "copy",
				// 		"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
				// 		"className": "btn btn-white btn-primary btn-bold"
				// 	  },
				// 	  {
				// 		"extend": "csv",
				// 		"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
				// 		"className": "btn btn-white btn-primary btn-bold"
				// 	  },
				// 	  {
				// 		"extend": "excel",
				// 		"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
				// 		"className": "btn btn-white btn-primary btn-bold"
				// 	  },
				// 	  {
				// 		"extend": "pdf",
				// 		"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
				// 		"className": "btn btn-white btn-primary btn-bold"
				// 	  },
				// 	  {
				// 		"extend": "print",
				// 		"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
				// 		"className": "btn btn-white btn-primary btn-bold",
				// 		autoPrint: false,
				// 		message: 'This print was produced using the Print button for DataTables'
				// 	  }		  
				// 	]
				// } );
				// myTable.buttons().container().appendTo( $('.tableTools-container') );
		
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});


				$('#btn_enable').click(function(e) {
		
				if(confirm('คุณต้องการเปิดการใช้งานนี้ใช่หรือไม่')){
					
					$('#frm_usermanagement').attr('action', '<?php echo base_url().'user/checkall_enable'; ?>');
					$('#frm_usermanagement').submit();
					
				}else{
					
					return false;
				}
				
		       
				
		    });
			
			$('#btn_disable').click(function(e) {
				
				if(confirm('คุณต้องการระงับรายการนี้ใช่หรือไม่')){
				
		       		$('#frm_usermanagement').attr('action', '<?php echo base_url().'user/checkall_disable'; ?>');
					$('#frm_usermanagement').submit();
				
				}else{
				
					return false;	
				}
				
		    });
			
			$('#btn_delete').click(function(e) {
				
				if(confirm('คุณต้องการลบรายการใช้งานนี้ใช่หรือไม่')){
				
		        	$('#frm_usermanagement').attr('action', '<?php echo base_url().'user/checkall_delete'; ?>');
					$('#frm_usermanagement').submit();
				
				}else{
					
					return false;
				}
				
		    });

			
			
			})
		</script>

		


		