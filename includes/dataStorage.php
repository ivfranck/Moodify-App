<?php

class DataTransfer{

    public static $trackNameArtist;
    public static $userId;


    function __construct(){
        $this->track = $_POST['track-info'];
        $this->playlistid = $_POST["playlistid"];
        $this->conn = DataTransfer::dbConnection();

    }

    function dbConnection(): mysqli{
        require_once "../authentication/includes/db-users.php";
        $connClass = new dbConn();
        return $connClass->dbconnection();
    }

    function addData(){

        $trackArray = explode(",", $this->track);
        $dayNum = date("d",time());
        $monthNum = date("m",time());
        $yearNum = date("Y",time());
        self::$userId = $trackArray[2];
        self::$trackNameArtist = $trackArray[0];
        $trackId = $trackArray[1];

        $mood = $_POST["mood"];
        $journal = $_POST["journal"];
        $imageid = $_POST["imageid"];


        $sql = "insert into `content` (`userid`,`contentday`, `contentmonth`, `contentyear`, `contentmood`, `contenttext`, `contentimageid`, `contentsongname`, `contentsongid`, `contentalbumid`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($this->conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../Calendar_Diary/main.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssssssss", self::$userId, $dayNum, $monthNum, $yearNum, $mood, $journal, $imageid, self::$trackNameArtist, $trackId, $this->playlistid);
        mysqli_stmt_execute($stmt);

        header("Location: ../Calendar_Diary/main.php?error=none");
        exit();
    }
}
if(isset($_POST["nextBtn"])){
    $run = new DataTransfer();
    $run->addData();
}

