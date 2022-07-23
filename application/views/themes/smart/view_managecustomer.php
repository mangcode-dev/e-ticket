<!-- start page content -->
<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Customer List</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-address-book-o"></i>&nbsp;<a class="parent-item"
										href="#">Customers</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<!-- <li><a class="parent-item" href="">Data Tables</a>&nbsp;<i
										class="fa fa-angle-right"></i>
								</li> -->
								<li class="active">Manage Customer</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="card card-box">
								<div class="card-head">
									<header>CUSTOMER LIST</header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
										<i class="material-icons">more_vert</i>
									</button>
									<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
										data-mdl-for="panel-button">
										<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
										</li>
										<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
											here</li>
									</ul>
								</div>
								<div class="card-body " id="bar-parent">
								<div class="table-responsive">
									<table id="exportTable" class="display nowrap" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Name</th>
												<th>Group</th>
                                                <th>Country</th>
												<th>Age</th>
                                                <th>E-Mail</th>
												<th>Phone</th>
												<th>Gender</th>
                                                <th>Status</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$list_customer = array_filter($list_customer);
												// var_dump($list_customer);
												// exit;
												if (!empty($list_customer)) {
													$i = 1;
													foreach ($list_customer as $customer_detail) {
														if ($customer_detail['enable'] == '1'){ 
													  
															$txt_status = '<span class="label label-success">ENABLE</span>'; 
															// $txt_color = '#0EC952';
														
														}else{
														   
														  $txt_status = '<span class="label label-warning">DISABLE</span>'; 
															// $txt_color = '#FF0000'; 
														  
														}
														
														
												?>
														<tr>
															<td style="text-align:center;"><?php echo $i; ?></td>
															<td><?php echo $customer_detail['cus_name']; ?></td>
															<td><?php echo $customer_detail['cus_g_name']; ?></td>
															<td><?php echo $customer_detail['cus_country']; ?></td>
															<td><?php echo $customer_detail['cus_age']; ?></td>
															<td><?php echo $customer_detail['cus_email']; ?></td>
															<td><?php echo $customer_detail['cus_phone']; ?></td>
															<td><?php echo $customer_detail['cus_gender']; ?></td>
															<td><?php echo $txt_status; ?></td>
															<td>
																<button type="button" class='btn btn-success btn-xs' data-original-title='Edit' onclick="javascript:window.location='<?php echo base_url() . 'Customer/manage/' . $customer_detail['cus_id']; ?>';"><i class='fa fa-pencil'></i></button>
																<button type="button" class='btn btn-danger btn-xs' data-original-title='Delete' onclick="javascript:if(confirm('คุณต้องการลบรายการนี้ใช่หรือไม่?')){ window.location='<?php echo base_url() . 'Customer/delete/' . $customer_detail['cus_id']; ?>'; }else{ return false; }"><i class='fa fa-trash-o'></i></button>
															</td>
														</tr>
													<?php $i++;
													}
												} else { ?>
													<tr>
														<td colspan="5" style="text-align:center;">Data Not Found.</td>
													</tr>
												<?php } ?>
											
										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
                                                 <th>Name</th>
												<th>Group</th>
                                                <th>Country</th>
												<th>Age</th>
                                                <th>E-Mail</th>
												<th>Phone</th>
												<th>Gender</th>
                                                <th>Status</th>
                                                <th>Action</th>
											</tr>
										</tfoot>
									</table>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->