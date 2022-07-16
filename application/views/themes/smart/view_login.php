

		<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">

							
						<figure><img src="<?php echo base_url(); ?>/themes/smart/img/pages/signin.jpg" alt="sing up image"></figure>
						<a href="sign_up.html" class="signup-image-link">Create an account</a>
					</div>
					<div class="signin-form">
						<h2 class="form-title">Login</h2>
						<?php echo form_open("Login/account", array('id'=>'login-form'));?>
						<!-- <form class="register-form" id="login-form"> -->
							<div class="form-group">
								<div class="">
									<input name="txt_usr" type="text" placeholder="User Name"
										class="form-control input-height" /> </div>
							</div>
							<div class="form-group">
								<div class="">
									<input name="txt_pwd" type="password" placeholder="Password"
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
							<span class="social-label">Or login with</span>
							<ul class="socials">
								<li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
								<li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
								<li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>









