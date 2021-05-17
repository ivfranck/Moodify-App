<?php
class dbConn{
    function dbconnection(): mysqli{
        $hostname = 'ID329136_moodify.db.webhosting.be';
        $db = 'ID329136_moodify';
        $username = 'ID329136_moodify';
        $dbpass = 'moodifyteampass2021';

        $conn = mysqli_connect($hostname, $username, $dbpass, $db);

        if ($conn == false){
            die("Connection Failed: ".mysqli_connect_error());
        }else{
            return $conn;
        }
    }
}