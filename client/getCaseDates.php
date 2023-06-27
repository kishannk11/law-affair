<?php
class CaseDates {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    // Method to get the filling date and case next date for a given case number
    public function getCaseDates($caseNumber) {
        $stmt = $this->conn->prepare("SELECT filling_date, case_next_date FROM cases WHERE case_number = ?");
        $stmt->bindParam(1, $caseNumber);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>