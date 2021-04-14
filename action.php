<?php
if (isset($_POST["nextBtn"])){
    $one = $_POST["fname"];
    $two = $_POST["email"];
    $three = $_POST["dd"];
    $four = $_POST["uname"];

    //db-handler
    require_once "authentication/includes/db-users.php";


    $sql = "insert into `test_table` (`name`,`email`, `day`, `password`) values (?, ?, ?, ?);";

    //to make sure its more secure to prevent sql injection
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: entries.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssss", $one, $two, $three, $four);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("Location: entries.php?error=none");
    exit();


}
else{
    header("Location: entries.php?error=here");
    exit();
}