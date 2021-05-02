<?php

class DataTransfer{

    public static $trackNameArtist;
    public static $userId;

    function __construct(){
        $this->track = $_POST['track'];
        $this->conn = DataTransfer::dbConnection();

    }

    function dbConnection(): mysqli{
        require_once "../authentication/includes/db-users.php";
        $connClass = new dbConn();
        return $connClass->dbconnection();
    }

    function addTrack(){

        $track = json_decode($this->track);
        $trackArray = explode(",", $track);

        self::$userId = $trackArray[2];
        self::$trackNameArtist = $trackArray[0];
        $trackId = $trackArray[1];


        $sql = "insert into `trackTest` (`userid`,`trackname`, `trackNumber`) values (?, ?, ?);";

        $stmt = mysqli_stmt_init($this->conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../spotify.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sss", self::$userId, self::$trackNameArtist, $trackId);
        mysqli_stmt_execute($stmt);
    }
}
$run = new DataTransfer();
$run->addTrack();






