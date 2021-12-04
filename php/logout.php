<?php 

session_start();
if(isset($_POST["logout"])){
    echo "post body scop";
    echo "logged in : " . $_SESSION["loggedin"];
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true ){
        echo "loggedin scop";
        $_SESSION["loggedin"] = false;
        $_SESSION["userid"] = -1;

        session_destroy();

        header("Location: http://localhost:8000/php/task/public/login ");
    }

}

?>