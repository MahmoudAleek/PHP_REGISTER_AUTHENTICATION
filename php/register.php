<?php
require_once('../config/utilities.php');
session_start();


if(isset($_POST["register"])){
	$c = connect();
   
	if($c){


		$isUnique = sqlSelect($c,"SELECT id FROM users where email=? ",'s',$_POST['email']);
		if($isUnique->num_rows == 0 ){
			
            $hashed = password_hash($_POST["password"],PASSWORD_DEFAULT);
			$insertUser = sqlInsert($c,"INSERT INTO users  VALUES(null,?,?,?,0)",'sss',$_POST['username'],$_POST["email"],$hashed);
			
			$_SESSION["loggedin"] = true;
			$_SESSION["userid"] = $insertUser;
			// echo $insertUser;
			header("Location: http://localhost:8000/php/task/dashboard  ");
		}else{
			
            header("Location: http://localhost:8000/php/task/register ");
			
		}


	}
}

// if($checkemail == false){
// 	$emailNotUnique = '{ "check": false , "message":"this email is already used" }';
// v


// }


?>