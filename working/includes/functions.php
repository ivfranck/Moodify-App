<?php


function invalidUid($userid){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $userid)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function pwdMatch($password, $passRepeat){
    $result;
    if($password !== $passRepeat){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function assoc($conn){
    $sqlQuery = "select * from `users`;";

    $result = mysqli_query($conn, $sqlQuery);


    return $result->fetch_all(MYSQLI_ASSOC);
}
function uidExists($conn, $userid, $email){
    $sql = "select * from `users` where `userName` = ? or `userEmail` = ?;";
    $stmt = mysqli_stmt_init($conn);
    //check for errors that might come up
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../create_account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $userid, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

/**
function uidExistss($conn, $userid, $email){

    $dbArray = assoc($conn);

    $status = true;

    foreach ($dbArray as $ele){
        if ( $ele['userName'] == $userid){
            //echo "User already exists";
            return false;
        }
        if($ele['userEmail'] == $email){
            return false;
        }
    }
    //header_footer("Location: ../create_account.php?error=usernametaken");
    return $status;
}
 **/
/**
function createUserr($conn, $userid, $firstname, $lastname, $email, $number, $password){
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sqlQuery = "insert into `users` (`userName`, `userFirstname`, `userLastname`, `userEmail`, `userGSM`, `userPassword`) 
                    values ('$userid', '$firstname', '$lastname', '$email', '$number', '$hashedPassword');";

    $result = mysqli_query($conn, $sqlQuery);

    header_footer("Location: ../create_account.php?error=none");
    exit();

}
 **/

function createUser($conn, $userid, $firstname, $lastname, $email, $number, $password){
    $sql = "insert into `users` (`userName`,`userFirstname`, `userLastname`, `userEmail`, `userGSM`, `userPassword`) values (?, ?, ?, ?, ?, ?);";

    //to make sure its more secure i.e sql injection
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../create_account.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $userid, $firstname, $lastname, $email, $number, $hashedPassword);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("Location: ../create_account.php?error=none");
    exit();

}

function loginUser($conn, $userid, $password){
    $uidExists = uidExists($conn, $userid, $password);

    if($uidExists === false){
        header("Location: ../login.php?error=wronglogin");
        exit();
    }

    //check if password is correct
    $passhashed = $uidExists["userPassword"];
    $checkpass = password_verify($password, $passhashed);

    if($checkpass === false){
        header("Location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkpass === true){
        session_start();
        //for session its userid in db
        $_SESSION["userId"] = $uidExists["userId"];
        $_SESSION["userName"] = $uidExists["userName"];

        header("Location: ../index.php");
        exit();
    }
}


/**
function loginUser($conn, $userid, $password){
    $dbArray = assoc($conn);

    $status = true;
    $success = false;
    $dbUsername;
    // $ele['userPassword'] == $password
    foreach ($dbArray as $ele){
        if ( $ele['userName'] == $userid || $ele['userEmail'] == $userid){
            if( password_verify($password, $ele['userPassword'])){
                $success = true;
                //$ele['user']
                break;
            }
        }
    }
    $sqlQuery = "select * from `users` where `user`;";

    $result = mysqli_query($conn, $sqlQuery);


    $res = $result->fetch_all(MYSQLI_ASSOC);
    if(!$success){
        header_footer("Location: ../login.php?error=wronglogin");
        exit();
    }
    else{
        echo "u r in";
        //session_start();
        //userid from db
        //$_SESSION["userid"]
    }

}

**/

