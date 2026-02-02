<?php
class Logger {
    private $db;
    public function __construct($conn){
        $this->db = $conn;
    }

    public function log($user,$action){
        $stmt = $this->db->prepare("INSERT INTO logs (username,action) VALUES (?,?)");
        $stmt->bind_param("ss",$user,$action);
        $stmt->execute();
    }
}

