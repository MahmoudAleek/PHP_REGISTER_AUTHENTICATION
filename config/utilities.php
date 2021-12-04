<?php
require_once("config.php");

function connect(){


    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME);
    if($conn->error){
        return false;
    }
    return $conn;
}


function sqlSelect($C, $query, $format = false, ...$vars) {
    $stmt = $C->prepare($query);
    if($format) {
        $stmt->bind_param($format, ...$vars);
    }
    if($stmt->execute()) {
        $res = $stmt->get_result();
        $stmt->close();
        return $res;
    }
    $stmt->close();
    return false;
}


function sqlInsert($C, $query, $format = false, ...$vars) {
    $stmt = $C->prepare($query);
    if($format) {
        $stmt->bind_param($format, ...$vars);
    }
    if($stmt->execute()) {
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }
    $stmt->close();
    return -1;
}

function sqlDelete($C, $query, $format = false, ...$vars){
    $stmt = $C->prepare($query);
    if($format) {
        $stmt->bind_param($format, ...$vars);
    }
    if($stmt->execute()) {
        // $res = $stmt->get_result();
        $stmt->close();
        return true;
    }
    $stmt->close();
    return false;
}

function isEmailExist($userEmail){
    $c = connect();
    $sql = "SELECT email FROM users WHERE email=?";
     $checkEmail = sqlSelect($c,$sql,"s",$userEmail);
     if($checkEmail->num_rows > 0){
         return true;
     }else{
         return false;
     }
}

?>