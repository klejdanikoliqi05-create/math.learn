<?php
class Exercise {
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function getAll(){
        $res = $this->conn->query("SELECT * FROM exercises ORDER BY id ASC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}
