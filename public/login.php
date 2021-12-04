<?php
require_once("../config/utilities.php");
session_start();

if(isset($_POST['login'])){
	

	$email = $_POST["email"];
	$password = $_POST["password"];

	$c = connect();
	echo $email;
	$getHashedPassword = sqlSelect($c,"SELECT * FROM users where email=? LIMIT 1 ",'s',$email);
	
	if($getHashedPassword && $getHashedPassword->num_rows == 1){

		$user = mysqli_fetch_assoc($getHashedPassword);
		echo $user["email"];
		if(password_verify($password,$user["password"]) && $password != null){

			$_SESSION["loggedin"] = true;
			$_SESSION["userid"] = $user["id"];

			$email = null;
			$password = null;
			header("Location: http://localhost:8000/php/task/dashboard");
		}  
	}else{

		$_SESSION["loggedin"] = false;
		$_SESSION["userid"] = null;
		header("Location: http://localhost:8000/php/task/asdsfhba");
	}
 


}


?> 



<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../Layouts/css_files.php") ?>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form  method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" value="LOGIN" name="login" class="login100-form-btn"  />
							
						
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="http://localhost:8000/php/task/public/forgotten-password">
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