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
        $stmt = $this->conn->prepare("SELECT DISTINCT case_number,`filing_number`, `fillingDate`, `client`, `party_name`, `case_status`, `advocate`, `case_next_date` FROM cases WHERE advocate = ?");
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
?>