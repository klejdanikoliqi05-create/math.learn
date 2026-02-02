<?php
class Database {
    private $host = "localhost";
    private $db   = "math.learn";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function connect() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db,
            3306 
        );
        if ($this->conn->connect_error) {
            die("DB Error: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
