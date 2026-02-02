<?php
class Log {
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function add($username,$action){
        $stmt = $this->conn->prepare("INSERT INTO logs (username,action) VALUES (?,?)");
        $stmt->bind_param("ss",$username,$action);
        return $stmt->execute();
    }

    public function getAll(){
        $res = $this->conn->query("SELECT * FROM logs ORDER BY id DESC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}

