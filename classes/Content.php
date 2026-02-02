<?php
class Content {
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function getPage($page){
        $stmt = $this->conn->prepare("SELECT * FROM content WHERE page=? LIMIT 1");
        $stmt->bind_param("s",$page);
        $stmt->execute();
        $res = $stmt->get_result();
        if($res->num_rows > 0){
            return $res->fetch_assoc();
        }
        return ['body' => ''];
    }
}
