<?php
class Auth {
    private $db;
    public function __construct($db){
        $this->db = $db;
    }

    public function checkAdmin(){
        session_start();
        return isset($_SESSION['role']) && $_SESSION['role'] === "admin";
    }

    public function requireLogin(){
        session_start();
        if(!isset($_SESSION['user_id'])){
            header("Location: login.php");
            exit;
        }
    }
}

