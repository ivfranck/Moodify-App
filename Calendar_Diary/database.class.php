

<?php 

class Db {
    private $host = 'ID329136_moodify.db.webhosting.be';
    private $dbName = 'ID329136_moodify';
    private $user = 'ID329136_moodify';
    private $datapass = 'moodifyteampass2021';

    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->datapass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}

class Query extends Db {

    public function getQuery($id, $monthNum, $yearNum){
        $sql = "SELECT * FROM content WHERE userid = '$id' AND contentmonth = '$monthNum' AND contentyear = '$yearNum'";
        $stmt = $this->connect()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
}
