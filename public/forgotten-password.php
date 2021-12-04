

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../Layouts/css_files.php") ?>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 ">


				<form action="../php/reset-request.inc.php"  method="POST" class=" col-12 login100-form validate-form">

					<div class="wrap-input100 validate-input text-center" style="margin: auto;" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" value="Please insert your email to resset your password " name="resset-request-submit" class="login100-form-btn"  />
						<?php if(isset($_GET["reset"]) && $_GET["reset"] == "success" ) {
							
							echo'<span class="text-success"> Please,Check your email !!!  </span>';
							 } 
							 ?>
						
						<?php if(isset($_GET["reset"]) && $_GET["reset"] == "usernotfound" ) {
							
							echo'<span class="text-danger"> We couldn\'t find your email,<a class="txt2" href="http://localhost:8000/php/task/public/register">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> </span>';
							 } 
							 ?>
						
					</div>


					<div class="text-center p-t-136">
						<!-- <a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> -->
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<?php include("../Layouts/js_files.php") ?>

</body>
</html>