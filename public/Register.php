<?php
require_once("../config/utilities.php");

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../Layouts/css_files.php") ?>
</head>
<body>
<div >

    </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form id="registerForm" data-test="registerform" action="php/register.php"  class="login100-form validate-form"  method="post">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate= "Full name is required" >
						<input class="input100" type="text" id="username" name="username" placeholder="Full Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100" type="email" id="email" autocomplete="user-email" name="email" placeholder="Email">
						
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
						
					</div>
					<p id="emailerr" class="text text-danger" style="margin-left:20px;"></p>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="pass" placeholder="Password" autocomplete="on">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "confirm Password is required">
						<input class="input100" type="password" name="confirmation_password" id="conf-pass" autocomplete="new-password" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" name="register" value="Register" class="login100-form-btn">
	
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	<?php include("../Layouts/js_files.php") ?>


</body>
</html>