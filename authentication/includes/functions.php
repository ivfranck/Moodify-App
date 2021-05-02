<?php
class Auth{

    function __construct(){
        $this->userId = $_SESSION["userId"];
        $this->userName = $_SESSION["userName"];
        $this->userFirstName = $_SESSION["userFirstName"];
        $this->userLastName = $_SESSION["userLastName"];
        $this->userEmail = $_SESSION["userEmail"];
        $this->userGSM = $_SESSION["userGSM"];
    }


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

    function uidExists($conn, $userid, $email){
        $sql = "select * from `users` where `userName` = ? or `userEmail` = ?;";
        $stmt = mysqli_stmt_init($conn);

        //check for errors that might come up
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }
        //fill sql query with parameters
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

    function createUser($conn, $userid, $firstname, $lastname, $email, $number, $password){
        $sql = "insert into `users` (`userName`,`userFirstname`, `userLastname`, `userEmail`, `userGSM`, `userPassword`) values (?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);

        // check for potential errors
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssssss", $userid, $firstname, $lastname, $email, $number, $hashedPassword);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("Location: ../signup.php?error=none");
        exit();

    }

    function loginUser($conn, $userid, $password){
        $uidExists = Auth::uidExists($conn, $userid, $password);

        //check if username is correct
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
            //to use when user is logged in
            $_SESSION["userId"] = $uidExists["userId"];
            $_SESSION["userName"] = $uidExists["userName"];
            $_SESSION["userFirstName"] = $uidExists["userFirstName"];
            $_SESSION["userLastName"] = $uidExists["userLastName"];
            $_SESSION["userEmail"] = $uidExists["userEmail"];
            $_SESSION["userGSM"] = $uidExists["userGSM"];


            header("Location: /../index.php");
            exit();
        }
    }

    function editUser($conn, $useruid, $firstname, $lastname, $email, $number, $password){
        $sql = "update `users` set `userFirstname`= ?, `userLastname`= ?, `userEmail`= ?, `userGSM`= ?, `userPassword`= ? where `userName`= ?;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../profile.php?error=stmtfailed");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $number, $hashedPassword, $useruid);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        $uidExists = Auth::uidExists($conn, $useruid, $password);
        session_start();
        $_SESSION["userId"] = $uidExists["userId"];
        $_SESSION["userName"] = $uidExists["userName"];
        $_SESSION["userFirstName"] = $uidExists["userFirstName"];
        $_SESSION["userLastName"] = $uidExists["userLastName"];
        $_SESSION["userEmail"] = $uidExists["userEmail"];
        $_SESSION["userGSM"] = $uidExists["userGSM"];

        header("Location: ../profile.php?error=none");
        exit();
    }

    function deleteUser($conn, $userid, $password){
        $sql = "delete from `users` where `userName` = ?;";

        $uidExists = Auth::uidExists($conn, $userid, $password);

        //check if password is correct
        $passhashed = $uidExists["userPassword"];
        $checkpass = password_verify($password, $passhashed);

        $stmt = mysqli_stmt_init($conn);
        if ($checkpass === false){
            header("Location: ../profile.php?error=wrongpass");
            exit();
        }
        else{
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../profile.php?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $userid);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
            session_start();
            session_unset();
            session_destroy();
            header("Location: /../index.php");
            exit();
        }
    }
}
