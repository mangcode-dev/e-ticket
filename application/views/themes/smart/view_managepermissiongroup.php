<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Manage Permission Group</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-list-ul"></i>&nbsp;<a class="parent-item" href="#">Permission Group</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<!-- <li><a class="parent-item" href="">Forms</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li> -->
					<li class="active">Manage Permission Group</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 col-sm-7">
				<div class="card card-box">
					<div class="card-head">
						<header>LIST PERMISSION GROUP</header>
						<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button">
							<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
						</ul>
					</div>
					<div class="card-body " id="bar-parent">
						<?php echo form_open('#', array('id' => 'frm_Permissiongroupmanagement', 'name' => 'frm_Permissiongroupmanagement')); ?>
						<div class="table-responsive">
							<table class="table table-striped custom-table table-hover">
								<thead>
									<tr>
										<!-- <th> Company</th>
										<th>Descrition</th>
										<th>Profit</th>
										<th>Progress</th>
										<th>Status</th>
										<th>Action</th> -->
										<th style="text-align:center;">No</th>
										<th data-class="expand"><i class="fa fa-list-ul text-muted hidden-md hidden-sm hidden-xs"></i> Name</th>
										<th>Status</th>
										<th data-hide="phone,tablet">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$list_permissiongroup = array_filter($list_permissiongroup);
									if (!empty($list_permissiongroup)) {
										$i = 1;
										foreach ($list_permissiongroup as $permissiongroup_detail) {
											if ($permissiongroup_detail['enable'] == '1') {
												$txt_status = 'ENABLE';
												$txt_color = '#0EC952';
											} else {
												$txt_status = 'DISABLE';
												$txt_color = '#FF0000';
											}
									?>
											<tr>
												<td style="text-align:center;"><?php echo $i; ?></td>
												<td><?php echo $permissiongroup_detail['name']; ?></td>
												<td><?php echo '<span style="color:' . $txt_color . '">' . $txt_status . '</span>'; ?></td>
												<td>
													<button type="button" class='btn btn-success btn-xs' data-original-title='Edit' onclick="javascript:window.location='<?php echo base_url() . 'Permissiongroup/manage/' . $permissiongroup_detail['spg_id']; ?>';"><i class='fa fa-pencil'></i></button>
													<button type="button" class='btn btn-danger btn-xs' data-original-title='Delete' onclick="javascript:if(confirm('??????????????????????????????????????????????????????????????????????????????????????????????')){ window.location='<?php echo base_url() . 'Permissiongroup/delete/' . $permissiongroup_detail['spg_id']; ?>'; }else{ return false; }"><i class='fa fa-trash-o'></i></button>
												</td>
											</tr>
										<?php $i++;
										}
									} else { ?>
										<tr>
											<td colspan="4" style="text-align:center;">Data Not Found.</td>
										</tr>
									<?php } ?>




								</tbody>
							</table>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-sm-5">
				<div class="card card-box">
					<div class="card-head">
						<header>FORM PERMISSION GROUP</header>
						<button id="panel-button2" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</button>
						<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button2">
							<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
							</li>
							<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
						</ul>
					</div>
					<div class="card-body " id="bar-parent1">


						<?php if ($frmEdit == FALSE) { ?>
							<?php echo form_open('Permissiongroup/add', array('id' => 'smart-form-register', 'class' => 'form-horizontal')); ?>

							<div class="row">
								<div class="col-xs-12">
									<div class="col-xs-1">
									</div>
									<div class="col-xs-10">

										<!-- <span class="block input-icon input-icon-right">
												<input type="text" name="txt_name" placeholder="Permissiongroup Name" class="width-100" />
												<i class="ace-icon fa fa-group"></i>
											</span> -->
										<div class="form-group row">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-list-ul"></i></span>

												<input type="text" name="txt_name" placeholder="             Enter Permissiongroup Name  " size="40">
											</div>
										</div>



										<div class="form-group">
											<div class="radio">
												Status
												<div class="radio p-0">
													<input type="radio" name="rad_status" id="optionsRadios1" value="1" checked>
													<label for="optionsRadios1">
														Enable
													</label>

													&nbsp;&nbsp;&nbsp;

													<input type="radio" name="rad_status" id="optionsRadios2" value="0">
													<label for="optionsRadios2">
														Disable
													</label>

												</div>

												


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
									<input type="hidden" name="action" value="<?php echo base64_encode('addPermissionGroup'); ?>" />

									<!-- &nbsp; &nbsp; &nbsp;
													<button class="btn" type="reset">
														<i class="ace-icon fa fa-undo bigger-110"></i>
														Reset
													</button> -->
								</div>
							</div>

							<?php echo form_close(); ?>

						<?php } else { // Form Edit 
						?>

							<?php echo form_open('Permissiongroup/edit/' . $perDataEdit['spg_id'] . '', array('id' => 'smart-form-register', 'class' => 'form-horizontal')); ?>



							<div class="row">
								<div class="col-xs-12">
									<div class="col-xs-1">
									</div>
									<div class="col-xs-10">
										<div class="form-group">

											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-group"></i></span>
												<input type="text" name="txt_name"  placeholder="             Enter Permissiongroup Name  " size="40" value="<?php echo $perDataEdit['name']; ?>">
											</div>
										</div>

										<div class="form-group">
											<div class="radio">
												Status
												<div class="radio p-0">
													<input type="radio" name="rad_status" id="optionsRadios1" value="1" <?php if ($perDataEdit['enable'] == '1') {
																															echo 'checked="checked"';
																														} else {
																															echo set_radio('rad_status', '1', TRUE);
																														} ?>>
													<label for="optionsRadios1">
														Enable
													</label>

													&nbsp;&nbsp;&nbsp;

													<input type="radio" name="rad_status" id="optionsRadios2" value="0" <?php if ($perDataEdit['enable'] == '0') {
																										echo 'checked="checked"';
																									} else {
																										echo set_radio('rad_status', '0');
																									} ?>>
													<label for="optionsRadios2">
														Disable
													</label>

												</div>

												

											</div>
										</div>

												

										
										
										
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
									<input type="hidden" name="action" value="<?php echo base64_encode('editPermissionGroup'); ?>" />

								</div>
							</div>



							<?php echo form_close(); ?>
						<?php } ?>



					</div>
				</div>
			</div>
		</div>


	</div>
</div>
<!-- end page content -->
<script src="<?php echo base_url() ?>themes/smart/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
<script src="<?php echo base_url()?>themes/smart/plugins/jquery-toast/dist/toast.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
	function alert_message(heading , text , loaderBg , icon ){
				 $.toast({
					heading:heading,
					text: text,
					position: 'top-right',
					loaderBg:loaderBg,
					icon: icon,
					hideAfter: 3000,
					stack: 6
				});
	}
	<?php
	if ($str_validate == FALSE){ echo validation_errors(); }
	if ($this->session->flashdata('msg_error') != ''){ echo $this->session->flashdata('msg_error'); }
	if ($this->session->flashdata('msg_success') != ''){ echo $this->session->flashdata('msg_success'); }
	?>
});
</script>



















