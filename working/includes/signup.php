<?php
if (isset($_POST["submit"])){
    $userid = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $password = $_POST["pwd"];
    $passRepeat = $_POST["pwdrepeat"];

    //db-handler
    require_once "db-handler.php";
    require_once "functions.php";
    //error handlers


    if (invalidUid($userid) !== false){
        header("Location: ../create_account.php?error=invalidUid");
        exit();
    }
    /**
    //make sure user typed password twice
    if (pwdMatch($password, $passRepeat) !== false){
        header_footer("Location: ../create_account.php?error=passwordsdontmatch");
        exit();
    }
     * **/
    //if username already exists
    if (uidExists($conn, $userid, $email) !== false){

        header("Location: ../create_account.php?error=usernametaken");

        exit();
    }
    createUser($conn, $userid, $firstname, $lastname, $email, $number, $password);
}
else{
    header("Location: ../create_account.php");
    exit();
}