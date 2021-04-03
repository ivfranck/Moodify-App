<?php
include "action.php";
$connection = connect();
if (isset($_POST["submit_login"])){
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $sqlQuery = "select * from `userInfo` where `userEmail` = '$email' and `userPassword` = MD5('$password');";
    $result = mysqli_query($connection, $sqlQuery) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if($rows == 1){
        $_SESSION['email'] = $email;
        header("Location: landing_page.php");
    }
    else{
        echo "Username/password is incorrect";
    }
}