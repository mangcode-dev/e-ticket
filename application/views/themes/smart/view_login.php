
<style>
/* body  {
  background-image: url("<?php echo base_url(); ?>themes/smart/img/back_login.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
	background-repeat: no-repeat;
  background-size: 1800px 1000px;
} */
@media screen and (max-height: 485px) and (min-height:350px){
    .container {
        height: 350px !important;
    }
    .signin-box{
        padding-left: 0px;
    }
}
@media screen and (max-height: 350px) {
    .container {
        height: 300px !important;
    }
    .signin-box{
        padding-left: 0px;
    }
}
.signin-box{
    padding-left: 50px;
}
@media screen and (max-width: 445px){
.container {
    width: 415px !important;
}
.signin-box{
    padding-left: 0px;
}
}
@media screen and (max-width: 765px) and (min-width: 445px){
.container {
    width: 445px !important;
}
.signin-box{
    padding-left: 0px;
}
}
.signin-form {
    margin-right: 0px;
    margin-left: 0px;
}
.container {
    width: 500px;
}
.signup-form, .signup-image, .signin-form, .signin-image {
    width: 100%;
}
.set_background{
	display: flex;
    background-image: url(<?php echo base_url(); ?>themes/smart/img/back_login.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-repeat: no-repeat;
    width: 100%;
    position: fixed;
    top: 0;
    bottom: 0;
    justify-content: center;
    align-items: center;
}
</style>

<body>

</body>
<div class="set_background">
<section class="sign-in">
			<div class="container row" style="opacity: 0.9;">
				<div class="signin-box">
					<div class="signin-image">
						<!-- <figure><img src="<?php echo base_url(); ?>/themes/smart/img/pages/signin.jpg" alt="sing up image"></figure> -->
						<!-- <a href="sign_up.html" class="signup-image-link">Create an account</a> -->
					</div>
					<div class="signin-form">
            <img src="<?php echo base_url(); ?>themes/smart/img/logo_login.jpg" alt="">
						<h2 class="form-title">Login</h2>
						<!--  -->

						<?php echo form_open("Login/account", array('id'=>'login-form'));?>
						<!-- <form class="register-form" id="login-form"> -->
							<div class="form-group">
								<div class="col-sm-12">
									<input name="txt_usr" id="txt_usr" type="text" placeholder="User Name"
										class="form-control input-height" /> </div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input name="txt_pwd" id="txt_pwd" type="password" placeholder="Password"
										class="form-control input-height" /> </div>
							</div>
							<div class="form-group">
								<input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
								<label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
									me</label>
							</div>
							<div class="form-group form-button">
								<button class="btn btn-round btn-primary" name="signin" id="signin">Login</button>
								<input type="hidden" name="action" value="<?php echo base64_encode('login');?>"  />

							</div>
						<?php echo form_close();?>
						<div class="social-login">
							<!-- <span class="social-label">Or login with</span> -->
							<!-- <ul class="socials">
								<li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
								<li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
								<li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	</body>
</div>
