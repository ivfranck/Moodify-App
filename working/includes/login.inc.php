<?php

if(isset($_POST["submit_login"])){
    $userid = $_POST["name"];
    $password = $_POST["pwd"];

    require_once "db-handler.php";
    require_once "functions.php";
    /**
    if (invalidUidLogin($userid, $password) !== false){
        header_footer("Location: ../create_account.php?error=invalidUid");
        exit();
    }
    **/
    loginUser($conn, $userid, $password);
}
else{
    header("Location: ../login.php");
    exit();
}