<?php

if(isset($_POST["submit_login"])){
    $userid = $_POST["name"];
    $password = $_POST["pwd"];

    require_once "db-users.php";
    require_once "functions.php";
    $connClass = new dbConn();
    $conn = $connClass->dbconnection();
    $auth = new Auth();
    $auth->loginUser($conn, $userid, $password);
}
else{
    header("Location: ../login.php");
    exit();
}