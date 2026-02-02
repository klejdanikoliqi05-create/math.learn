<?php
class Contact {
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function addMessage($name,$email,$message){
        $stmt = $this->conn->prepare("INSERT INTO contact (name,email,message) VALUES (?,?,?)");
        $stmt->bind_param("sss",$name,$email,$message);
        return $stmt->execute();
    }

    public function getAll(){
        $res = $this->conn->query("SELECT * FROM contact ORDER BY id DESC");
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}
