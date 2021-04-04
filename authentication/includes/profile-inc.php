<?php
if (isset($_POST["profile_btn"])){
    $useruid = $_POST["useruid"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $password = $_POST["password"];

    //db-handler
    require_once "db-users.php";
    require_once "functions.php";

    editUser($conn, $useruid, $firstname, $lastname, $email, $number, $password);
}
if (isset($_POST["del_btn"])){
    $useruid = $_POST["useruid"];
    $password = $_POST["password"];

    //db-handler
    require_once "db-users.php";
    require_once "functions.php";


    deleteUser($conn, $useruid, $password);
}
else{
    header("Location: ../profile.php");
    exit();
}