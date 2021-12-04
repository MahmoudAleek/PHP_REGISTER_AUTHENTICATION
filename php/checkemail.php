<?php 

require_once("../config/utilities.php");


if(isset($_POST["emailval"])){
    
    $email = $_POST["emailval"];
    if($email != NULL || $email != ''){
        $c = connect();
        $isUnique = sqlSelect($c,"SELECT id FROM users where email=? ",'s',$email);
    
    
        if ($isUnique->num_rows > 0) {
            $isEmailExists = true;
            header("Content-Type: Application/json");
            echo json_encode($isEmailExists);
        }else{
            header("Content-Type: Application/json");
            $isEmailExists= false;
            echo json_encode($isEmailExists);
        } 
    }

}


// function isEmailExists($email){
//     header("Location: HTTPS:\\WWW.GOOGLE.COM");
//     $c = connect();
//     $isUnique = sqlSelect($c,"SELECT id FROM users where email=? ",'s',$email);
//     if($isUnique == 1){ return true ;} 
//     else{return false;}
// }

?>