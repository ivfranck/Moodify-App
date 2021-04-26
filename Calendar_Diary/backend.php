
<?php 
/* Will need to be updated once we have a database */
    function makeConnection() {
        $serverName = "ID328528_practice.db.webhosting.be";
        $host = "ID328528_practice";
        $datapass = "Nothsa1993";
        $dbName = "ID328528_practice";
        $port = 3306;

        $conn = mysqli_connect($serverName, $host, $datapass, $dbName, $port);

        if($conn == false) {
            die("Connection Failed " . mysqli_connect_error());
        }
        return $conn;
    }

    function getQuery($query) {
        $conn = makeConnection();
        $result=mysqli_query($conn, $query);
            
        mysqli_close($conn);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
