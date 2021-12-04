<?php 

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once('../PHPMailer/src/PHPMailer.php');
require_once('../PHPMailer/src/SMTP.php');
require_once('../PHPMailer/src/Exception.php');



if($_POST["resset-request-submit"]){


    $selector = password_hash(random_bytes(8),PASSWORD_DEFAULT);
    $token = random_bytes(32);


    $url = "http://localhost:8000/php/task/public/create-new-password?selector=" . $selector . "&validator=" .password_hash($token,PASSWORD_DEFAULT);


     $expires = date("U") + 1800 ;

     $userEmail = $_POST["email"];

     require_once("../config/utilities.php");

    $sql = "DELETE  FROM pwdreset where pwdResetEmail=? "; 
    $c = connect();
    
    $deletOldToken = sqlDelete($c,"DELETE FROM pwdreset where pwdResetEmail=? ","s",$userEmail);
    if($deletOldToken === false){
       
        echo " There was an error! ";
        var_dump($deletOldToken);
        exit();
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?,?,?,?)";
    
    $hasedToken = password_hash($token,PASSWORD_DEFAULT);
     $insertNewToken = sqlInsert($c,$sql,"ssss",$userEmail,$selector,$hasedToken,$expires);
    if( $insertNewToken == -1 ){
        echo " There was an error!!";
    }


    // TO CHECK IF USER IS REALLY EXIST IN USERS TABLE I CREATE A FUNCTION FOR THAT 
    // IF USER EXIST THEN SEND TO HIM A RESET PASSWORD MAIL AND IF IT'S NOT NOTIFY THE USER 
    if(isEmailExist($userEmail)){
          $to = $userEmail;

          $subject = "Resset your password for HyperActive";
          
          $message = "<p> We recieved a passwoed resset request. The link to resset your password is below. If you did not make this request, you can ignore this email </p>";
          $message .= "<p>Here is your password resset link :  </br>";
          $message .= '<a href="' . $url . '">' . $url .'</a></p>';
          
          $headers = "From: HyperActive <HyperActive@gmail.com>";
          $headers .= "Reply-to: hyperactivetech@gmail.com";
          $headers .= "Content-type : text/html\r\n";
          
          $phpmailer = new PHPMailer();
          $phpmailer->isSMTP();
          $phpmailer->Host = 'smtp.mailtrap.io';
          $phpmailer->SMTPAuth = true;
          $phpmailer->Port = 2525;
          $phpmailer->Username = '886b8b81de8e6a';
          $phpmailer->Password = 'e7cd6668616595';
          $phpmailer->isHTML(true);
          
          
          $phpmailer->Subject = $subject;
          $phpmailer->Body = $message;
          
          $phpmailer->addReplyTo("hyperactivetech@gmail.com","HyperActivesender");
          $phpmailer->addAddress($to);
          $phpmailer->setFrom("HyperActive@gmail.com","HyperActive");
          $phpmailer->addCustomHeader('Content-type','text/html');
          
          
               if(!$phpmailer->send()){
                    echo "error while sending the mail";
                    
                    var_dump($phpmailer);
               }else{
                    header("Location: http://localhost:8000/php/task/public/forgotten-password?reset=success");
               }
          
     }else{
          header("Location: http://localhost:8000/php/task/public/forgotten-password?reset=usernotfound");
     }


}