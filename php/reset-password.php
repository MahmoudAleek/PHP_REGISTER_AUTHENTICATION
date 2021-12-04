<?php 
require_once("../config/utilities.php");


if(isset($_POST["reset-password-submit"])){

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];

    $c = connect();
    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? and pwdResetToken=? LIMIT 1";
    $isTokenExist = sqlSelect($c,$sql,"ss",$selector,$validator);

    if($isTokenExist->num_rows > 0 ){
        $userEmail =  $isTokenExist["email"];
        $currentPass = $_POST["current_password"];
        $newPass = $_POST["password"];
        $conNewPass = $_POST["confirmation_password"];

        $hashedPassword = password_hash($newPass,PASSWORD_DEFAULT);

        $sql="UPDATE users SET password=? where email=?";
        $upDatePassword = sqlInsert($c,$sql,"ss",$hashedPassword);
        if($upDatePassword->num_rows > 0){
            header("Location: http://localhost:8000/php/task/login?reset=success");
        }
    }else{
        header("Location: http://localhost:8000/php/task/create-new-password?invalidrequest=wrongurl");
    }

}
