<?php
if (isset($_POST["submit"])){
    $userid = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $password = $_POST["pwd"];

    //db-handler
    require_once "db-users.php";
    require_once "functions.php";
    //error handlers


    if (invalidUid($userid) !== false){
        header("Location: ../signup.php?error=invalidUid");
        exit();
    }
    //if username already exists
    if (uidExists($conn, $userid, $email) !== false){

        header("Location: ../signup.php?error=usernametaken");

        exit();
    }
    createUser($conn, $userid, $firstname, $lastname, $email, $number, $password);
}
else{
    header("Location: ../signup.php");
    exit();
}