<?php
if (isset($_POST["nextBtn"])){
    $one = $_POST["mood"];
    $two = $_POST["journal"];
    $three = $_POST["pic"];

    //db-handler
    require_once "authentication/includes/db-users.php";


    $sql = "insert into `test_table` (`mood`,`journal`, `picture`) values (?, ?, ?);";

    //to make sure its more secure to prevent sql injection
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: index.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sss", $one, $two, $three);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("Location: index.php?error=none");
    exit();


}
else{
    header("Location: entries.php?error=here");
    exit();
}