<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Register Promotion</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-object-group"></i>&nbsp;<a class="parent-item" href="#">Promotion</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<!-- <li><a class="parent-item" href="">Forms</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li> -->
					<li class="active">Register Promotion</li>
				</ol>
			</div>
		</div>
		<?php echo form_open('Promotion/add', array('id'=>'smart-form-register', 'class'=>'form-horizontal'));?>
		<input type="hidden" name="action" value="<?php echo base64_encode('add_promotion');?>"  />

		<div class="row">
			<div class="col-md-7 col-sm-12">

					<div class="card card-box">
						<div class="card-head"><header>Register Promotion</header></div>
						<div class="card-body row">
							<div >

								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" name="pro_code" maxlength="20" class="width-100" />

									<!-- <input class="mdl-textfield__input" type="text" value="Jayesh"
										id="txtFirstName" disabled> -->
									<label class="mdl-textfield__label">Promotion Code</label>
								</div>
							</div>
							<div class="col-lg-12 p-t-20">
								<div class="mdl-textfield mdl-js-textfield txt-full-width">
									<textarea class="mdl-textfield__input" rows="4" maxlength="500"
										id="text7"></textarea>
										<label class="mdl-textfield__label">Promotion Description</label>
								</div>
							</div>
							<div class="form-group">
									<label>Discount Price</label>
									<div class="input-group spinner">
											<span class="input-group-btn">
													<button class="btn btn-info" data-dir="dwn" type="button">
															<span class="fa fa-minus"></span>
													</button>
											</span>
											<input type="number" class="form-control text-center" value="0" min="0">
											<span class="input-group-btn">
													<button class="btn btn-danger" data-dir="up" type="button">
															<span class="fa fa-plus"></span>
													</button>
											</span>
									</div>
							</div>

							<div class="form-group">
								<div class="">
									<label>Unlimited Ticket</label>
								</div>
								<div class="">
									<label class="switchToggle">
											<input type="checkbox" class="checkbox_ticket" >
											<span class="slider green"></span>
									</label>
								</div>
							</div>
							<div class="input_Unlimited_Ticket form-group">
									<label>Ticket Limit</label>
									<div class="input-group spinner">
											<span class="input-group-btn">
													<button class="btn btn-info" data-dir="dwn" type="button">
															<span class="fa fa-minus"></span>
													</button>
											</span>
											<input type="number" class="form-control text-center" id="ticket_limit" name="ticket_limit" value="0" min="0">
											<span class="input-group-btn">
													<button class="btn btn-danger" data-dir="up" type="button">
															<span class="fa fa-plus"></span>
													</button>
											</span>
									</div>
							</div>

							<div class="form-group row">
									<label class=" ">Date Range:</label>
									<div class="col-lg-6 p-t-20">
											<div class="input-append date form_datetime"
													data-date="2013-02-21T15:25:00Z">
													<!-- <div class="input-group datePicker"> -->
															<input type="date" class="form-control input-height" value="<?php echo date("Y-m-d");?>">
															<!-- <span class="add-on dateBtn"><i -->
																			<!-- class="fa fa-calendar icon-th"></i></span> -->
													<!-- </div> -->
											</div>
									</div>
									<div class="col-lg-6 p-t-20">
											<div class="input-append date form_datetime"
													data-date="2013-02-21T15:25:00Z">
													<div class="input-group datePicker">
															<input type="Date" class="form-control input-height" value="<?php echo date("Y-m-d");?>">
															<!-- <span class="add-on dateBtn"><i -->
																			<!-- class="fa fa-calendar icon-th"></i></span> -->
													</div>
											</div>
									</div>
							</div>

							<div class="col-lg-12 p-t-20 text-center">
								<input type="submit"
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" value="Submit">
								<input type="Reset"
									id="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger" value="Cancel">
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
	  <!-- <link href="<?php echo base_url() ?>themes/smart/css/plugins.min.css" rel="stylesheet" type="text/css" /> -->
<script src="<?php echo base_url() ?>themes/smart/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
<!-- <script src="<?php echo base_url() ?>themes/smart/js/app.js"></script>
<script src="<?php echo base_url() ?>themes/smart/js/layout.js"></script>
<script src="<?php echo base_url() ?>themes/smart/js/theme-color.js"></script> -->


<!-- <script src="<?php echo base_url() ?>themes/smart/plugins/jquery-toast/dist/toast.js"></script> -->
<script type="text/javascript">
$( document ).ready(function() {
	$(".input_Unlimited_Ticket").hide()
	$(".checkbox_ticket").change(function() {
    if(this.checked) {
      	$(".input_Unlimited_Ticket").show()
    }else {
				$("#ticket_limit").val("0")
				$(".input_Unlimited_Ticket").hide()
    }
		$("#reset").click(function() {
			$("#ticket_limit").val("0")
			$(".input_Unlimited_Ticket").hide()
		})
});
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
