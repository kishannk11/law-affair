<?php
class UserLogin {
    private $conn;
    private $table_name = "advocates";
     public $id;
    public $username;
    public $password;
     public function __construct($db) {
        $this->conn = $db;
    }
     public function login() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();
         if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->password, $row['password'])) {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["role"] = $row["role"];
                 if (isset($_POST['remember_me'])) {
                    setcookie("username", $this->username, time() + (86400 * 30), "/");
                    setcookie("password", $this->password, time() + (86400 * 30), "/");
                }
                 return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

class getAllAdvocate { 
    private $conn; 
 
    public function __construct($conn) { 
        $this->conn = $conn; 
    } 
 
    public function getAdvocates() { 
        $stmt = $this->conn->prepare("SELECT * FROM advocates"); 
        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $result;
         
    }
}

class getAdvocateDetails {
    private $conn;
    private $advocateName;
    private $profilePath;
     public function __construct($conn) {
        $this->conn = $conn;
    }
     public function getAdvocateDetails() {
        session_start();
        $advocateId = $_SESSION['username'];
        $stmt = $this->conn->prepare("SELECT name, photo FROM advocates WHERE username = :username");
        $stmt->bindParam(':username', $advocateId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->advocateName = $result['name'];
        $this->profilePath = $result['photo'];
        $details = array(
            'name' => $this->advocateName,
            'profile_path' => $this->profilePath
        );
        return $details;
    }
}

class myCase {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function getCases() {
        $username = $_SESSION['username'];
        $stmt = $this->conn->prepare("SELECT c.case_number, c.filing_number, MIN(c.fillingDate) as fillingDate, c.client, c.party_name, s.case_status, c.advocate, MAX(c.case_next_date) as case_next_date
        FROM cases c
        INNER JOIN (
          SELECT case_number, fillingDate, GROUP_CONCAT(case_status ORDER BY fillingDate DESC SEPARATOR ',') as case_status
          FROM cases
          GROUP BY case_number, fillingDate
        ) s ON c.case_number = s.case_number AND c.fillingDate = s.fillingDate
        WHERE c.advocate = ?
        GROUP BY c.case_number, c.filing_number, c.client, c.party_name, s.case_status, c.advocate");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as &$case) {
            $advocateName = $this->getAdvocateName($case['advocate']);
            $clientName = $this->getClientName($case['client']);
            $case['advocate'] = $advocateName;
            $case['client'] = $clientName;
        }
        return $result;
    }
    public function getAdvocateName($username)
    {
        $stmt = $this->conn->prepare("SELECT name FROM advocates WHERE username = ?");
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['name'];
    }

    public function getClientName($username)
    {
        $stmt = $this->conn->prepare("SELECT name FROM clients WHERE username = ?");
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['name'];
    }
}

class getCaseDetails {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function getCases($id) {
        $advocate=$_SESSION['username'];
        $stmt = $this->conn->prepare("SELECT * FROM cases WHERE case_number = ? and advocate=? ");
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $advocate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as &$case) {
            $advocateName = $this->getAdvocateName($case['advocate']);
            $clientName = $this->getClientName($case['client']);
            $case['advocate'] = $advocateName;
            $case['client'] = $clientName;
        }
        return $result;
    }
    public function getAdvocateName($username)
    {
        $stmt = $this->conn->prepare("SELECT name FROM advocates WHERE username = ?");
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['name'];
    }
     public function getClientName($username)
    {
        $stmt = $this->conn->prepare("SELECT name FROM clients WHERE username = ?");
        $stmt->bindParam(1, $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['name'];
    }
}

class CaseDetails {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    // Method to get the case number for the current logged in user using the username from the session variable
    public function getCaseNumber() {
        $username = $_SESSION['username'];
        $stmt = $this->conn->prepare("SELECT case_number FROM cases WHERE advocate = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['case_number'];
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