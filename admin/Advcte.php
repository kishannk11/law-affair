<?php
class Advocate {
    private $conn;
     public function __construct($conn) {
        $this->conn = $conn;
    }
     public function getAdvocateDetailsById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM advocates WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>