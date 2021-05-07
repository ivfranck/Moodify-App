
<?php 
/* Will need to be updated once we have a database */

class Db {
    private $user = "ID328528_practice";
    private $host = "ID328528_practice.db.webhosting.be";
    private $datapass = "Nothsa1993";
    private $dbName = "ID328528_practice";

    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->datapass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}

class Query extends Db {

    public function getQuery($monthNum){
        $sql = "SELECT * FROM overview WHERE mood = '$monthNum'";
        $stmt = $this->connect()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
}
