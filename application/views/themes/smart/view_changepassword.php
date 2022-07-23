<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Change Password</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-object-group"></i>&nbsp;<a class="parent-item" href="#">Settings</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<!-- <li><a class="parent-item" href="">Forms</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li> -->
					<li class="active">Change Password</li>
				</ol>
			</div>
		</div>
		<?php echo form_open('changepassword/account', array('id'=>'smart-form-register', 'class'=>'form-horizontal'));?>
		<div class="row">
			<div class="col-md-7 col-sm-12">

					<div class="card card-box">
						<div class="card-head"><header>Details</header></div>
						<div class="card-body row">
							<div >

								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" name="txt_usr"   value="<?php echo $this->session->userdata('sessUsr');?> "  class="width-100" disabled />

									<!-- <input class="mdl-textfield__input" type="text" value="Jayesh"
										id="txtFirstName" disabled> -->
									<label class="mdl-textfield__label">Username</label>
								</div>
							</div>
							<div>
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" name="txt_oldpwd" type="password"
									  value="<?php echo set_value('txt_oldpwd');?>">
										<!-- <input data-rel="tooltip" type="password" name="txt_oldpwd" placeholder=2"Old Password" id="password" value="<?php echo set_value('txt_oldpwd'); ?>" title="Don't forget your old password" data-placement="bottom" class="width-100" /> -->

									<label class="mdl-textfield__label">Old Password</label>
								</div>
							</div>
							<div >
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input type="password" name="txt_newpwd"  value="<?php echo set_value('txt_newpwd'); ?>" class="mdl-textfield__input width-100"   />

									<label class="mdl-textfield__label">New Password</label>
									<span class="mdl-textfield__error">Enter Valid Email Address!</span>
								</div>
							</div>
							<div >
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input type="password" name="txt_cfpwd"   value="<?php echo set_value('txt_cfpwd'); ?>" class="mdl-textfield__input width-100" />
									<label class="mdl-textfield__label">Confirmed  Password</label>
								</div>
							</div>
							<div class="col-lg-12 p-t-20 text-center">
								<input type="hidden" name="action" value="<?php echo base64_encode('changepassword');?>"  />
								<input type="submit"
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" value="Submit">
								<input type="Reset"
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger" value="Cancel">
							</div>
						</div>
					</div>

			</div>
		</div>

	<?php echo form_close();?>

	</div>
</div>
<!-- <script src="<?php //echo base_url()  ?>themes/smart/plugins/jquery/jquery.min.js"></script> -->
<!-- bootstrap -->
	<!-- <script src="<?php echo base_url() ?>themes/smart/plugins/bootstrap/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url() ?>themes/smart/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
<!-- <script src="<?php echo base_url() ?>themes/smart/plugins/jquery-toast/dist/toast.js"></script> -->
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
if ($this->session->flashdata('msgResponse') != ''){ echo $this->session->flashdata('msgResponse'); }
?>
});
</script>
