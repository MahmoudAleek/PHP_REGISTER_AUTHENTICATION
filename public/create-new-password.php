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

                <?php 
                    $selector = $_GET["selector"];
                    $validator = $_GET["validator"];
                    if(empty($selector) || empty($validator)){
                        echo "We couldn't validate your request";
                    }else{
                     
                ?>
                    <form id="registerForm" data-test="registerform" action="php/reset-password.php"  class="login100-form validate-form"  method="post">
					<span class="login100-form-title">
						Member Login
					</span>

                    <input type="hidden" name="selector" value="<?php echo $selector?>">
                    <input type="hidden" name="validator" value="<?php echo $validator?>">


					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="pass" placeholder="New Password" autocomplete="on">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "confirm Password is required">
						<input class="input100" type="password" name="confirmation_password" id="conf-pass" autocomplete="new-password" placeholder="Confirm New Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" name="reset-password-submit" value="Update" class="login100-form-btn">
	
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
                
                <?php
                    }
                
                ?> 

			</div>
		</div>
	</div>
	
	<?php include("../Layouts/js_files.php") ?>


</body>
</html>