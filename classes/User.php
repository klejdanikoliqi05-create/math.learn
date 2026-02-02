<?php
class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function exists($email) {
        $stmt = $this->conn->prepare("SELECT id FROM {$this->table} WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res->num_rows > 0;
    }

 
    public function register($username, $email, $password) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (username, email, password, role) VALUES (?,?,?,?)");
        $role = "user"; 
        $stmt->bind_param("ssss", $username, $email, $password, $role);
        return $stmt->execute();
    }

    
    public function login($email) {
        $stmt = $this->conn->prepare("SELECT id, username, password, role FROM {$this->table} WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
