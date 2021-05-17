<?php

class GetData{
    function __construct(){
        $this->conn = GetData::dbConnection();
        $this->userid = $_SESSION["userId"];
        $this->dayNum = date("d",time());
        $this->monthNum = date("m",time());
        $this->yearNum = date("Y",time());
    }

    function dbConnection(): mysqli{
        require_once "authentication/includes/db-users.php";
        $connClass = new dbConn();
        return $connClass->dbconnection();
    }
    function getPlatlistId(){

        $sql = "select * from `content` where `userid`=? and `contentday`=? and `contentmonth`=? and `contentyear`=?;";
        $stmt = mysqli_stmt_init($this->conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../music.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssss", $this->userid, $this->dayNum, $this->monthNum, $this->yearNum);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);


        $row = mysqli_fetch_assoc($resultData);
        echo "<input type='hidden' id='playlistId' value=" .$row["contentalbumid"] . ">";
        echo "<input type='hidden' id='songId' value=" .$row["contentsongid"] . ">";
        return $row;
    }
}
$run = new GetData();
$run->getPlatlistId();





