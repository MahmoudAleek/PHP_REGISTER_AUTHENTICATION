
<?php

require_once("../config/utilities.php");
include('../php/logout.php');

if(!(isset($_SESSION["loggedin"])) && $_SESSION["loggedin"] == false){
    header("Location: http://localhost:8000/php/task/login");
}

$c =connect();
$dataUsers = sqlSelect($c , 'SELECT * FROM users');



if(isset($_POST["search"])){
	$searchValue = $_POST["search_value"];
	if(strpos($searchValue,'@')){
		$email = $_POST["search_value"];
		$dataUsers = sqlSelect($c , 'SELECT * FROM users where email=?','s',$email);
	}else{
		$name = $_POST["search_value"];
		$dataUsers = sqlSelect($c , 'SELECT * FROM users where name=?','s',$name);
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
				<div class="center">
					<form action="#" method="POST">
						<div class="input-group">
						<input type="search" name="search_value" class="form-control rounded" placeholder="Search for name or email ... " aria-label="Search"
						aria-describedby="search-addon" />
						<input type="submit" name="search" class="btn btn-outline-primary" value="SEARCH" />
						</div>
					</form>
				</div>

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    </tr>
                </thead>
              
                <tbody>
                <?php
				if(mysqli_num_rows($dataUsers) > 0){
                foreach($dataUsers as $key=>$item) { ?>
                    <tr>
                    <th scope="row"><?php echo $key+1; ?></th>
                    <td><?php echo $item["name"] ?></td>
                    <td><?php echo $item["email"] ?></td>
                    </tr>
                    <?php }/* end foreach */  } /* end if */?>
                </tbody>
            </table>
                    <form action="../php/logout" method="POST">
                        <input type="submit" name="logout"  class="btn btn-outline-primary" value="LOGOUT">
                    </form>
			</div>
		</div>
	</div>
	
	

	 <?php include("../Layouts/js_files.php") ?>
	

</body>
</html>


