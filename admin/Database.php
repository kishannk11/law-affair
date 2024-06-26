<?php

class User {
    private $conn;
    private $table_name = "admin";
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

class AddAdvocate
{
    private $conn;
    public $succes;
     public function __construct($conn)
    {
        $this->conn = $conn;
    }
     public function validateInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function addAdvocateData($name, $mobileNumber, $joiningDate, $photo, $address, $specialization, $username, $password,$role, $city, $state, $pincode, $country,$email)
    {
        // Validate and sanitize input data
        $name = $this->validateInput($name);
        $mobileNumber = $this->validateInput($mobileNumber);
        $joiningDate = $this->validateInput($joiningDate);
        $address = $this->validateInput($address);
        $username = $this->validateInput($username);
        $password = $this->validateInput($password);
        $city = $this->validateInput($city);
        $state = $this->validateInput($state);
        $pincode = $this->validateInput($pincode);
        $country = $this->validateInput($country);
        $email = $this->validateInput($email);
        // Validate and sanitize specialization array
        $specialization = array_map(array($this, 'validateInput'), $specialization);
        // Prepare and bind SQL statement
        $stmt = $this->conn->prepare("INSERT INTO advocates (name, mobile_number, joining_date, photo, address, specializations, username, password,role, city, state, pincode, country,email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $mobileNumber, PDO::PARAM_STR);
        $stmt->bindParam(3, $joiningDate, PDO::PARAM_STR);
        $stmt->bindParam(4, $photo, PDO::PARAM_STR);
        $stmt->bindParam(5, $address, PDO::PARAM_STR);
        $stmt->bindParam(6, json_encode($specialization), PDO::PARAM_STR);
        $stmt->bindParam(7, $username, PDO::PARAM_STR);
        $stmt->bindParam(8, $password, PDO::PARAM_STR);
        $stmt->bindParam(9, $role, PDO::PARAM_STR);
        $stmt->bindParam(10, $city, PDO::PARAM_STR);
        $stmt->bindParam(11, $state, PDO::PARAM_STR);
        $stmt->bindParam(12, $pincode, PDO::PARAM_STR);
        $stmt->bindParam(13, $country, PDO::PARAM_STR);
        $stmt->bindParam(14, $email, PDO::PARAM_STR);
        // Execute statement
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $this->succes = "Advocate added.";
        } else {
            $this->succes = "Error addding advocate.";
        }
    }
     public function getSuccessMessage()
    {
        return $this->succes;
    }
}


class Client
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function sanitizeInput($input)
    {
        return htmlspecialchars(strip_tags(trim($input)));
    }

    public function validateName($name)
    {
        return !empty($name) && preg_match("/^[a-zA-Z ]*$/", $name);
    }

    public function validateMobileNumber($mobileNumber)
    {
        return !empty($mobileNumber) && preg_match("/^[0-9]{10}$/", $mobileNumber);
    }

    public function validateAddress($address)
    {
        return !empty($address);
    }

    public function uploadFile($file, $destination)
    {
        $allowedExtensions = array('png', 'jpg', 'jpeg', 'pdf');
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions) && move_uploaded_file($file['tmp_name'], $destination)) {
            return true;
        } else {
            return false;
        }
    }

    public function addClient($name, $mobileNumber, $photo, $address, $document, $username, $city, $state, $pincode)
    {
        $stmt = $this->conn->prepare("INSERT INTO clients (name, mobile_number, photo_name, address, document_name, username, city, state, pincode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $mobileNumber);
        $stmt->bindParam(3, $photo);
        $stmt->bindParam(4, $address);
        $stmt->bindParam(5, $document);
        $stmt->bindParam(6, $username);
        $stmt->bindParam(7, $city);
        $stmt->bindParam(8, $state);
        $stmt->bindParam(9, $pincode);

        return $stmt->execute();
    }
}

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

class Delete_Client { 
    private $conn; 
 
    public function __construct($servername, $dbname, $username, $password) { 
        try { 
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) { 
            echo "Error: " . $e->getMessage(); 
        } 
    } 
 
    public function delete($id) { 
        try { 
            $stmt = $this->conn->prepare("DELETE FROM clients WHERE id = :id"); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute(); 
            return true; 
        } catch (PDOException $e) { 
            echo "Error: " . $e->getMessage(); 
            return false; 
        } 
    } 
 
    public function closeConnection() { 
        $this->conn = null; 
    } 
}

class DeleteAdvocate { 
    private $conn; 
     public function __construct($servername, $dbname, $username, $password) { 
        try { 
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) { 
            echo "Error: " . $e->getMessage(); 
        } 
    } 
     public function delete($id) { 
        try { 
            $stmt = $this->conn->prepare("DELETE FROM advocates WHERE id = :id"); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute(); 
            return true; 
        } catch (PDOException $e) { 
            echo "Error: " . $e->getMessage(); 
            return false; 
        } 
    } 
     public function closeConnection() { 
        $this->conn = null; 
    } 
}


class UpdateAdvocate {
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    } 

    public function sanitize_input($input) {
        return htmlspecialchars(stripslashes(trim($input)));
    }

    public function update_advocate($id, $name, $mobileNumber, $joiningDate, $photo, $address, $specialization, $city, $state, $pincode, $country) { 
        // Validate and sanitize input data 
        $name = $this->sanitize_input($name); 
        $mobileNumber = $this->sanitize_input($mobileNumber); 
        $joiningDate = $this->sanitize_input($joiningDate); 
        $address = $this->sanitize_input($address); 
        $city = $this->sanitize_input($city); 
        $state = $this->sanitize_input($state); 
        $pincode = $this->sanitize_input($pincode); 
        $country = $this->sanitize_input($country); 
        // Validate and sanitize specialization array 
        $specialization = array_map(array($this, 'sanitize_input'), $specialization); 
        // Prepare and bind SQL statement 
        $stmt = $this->conn->prepare("UPDATE advocates SET name = ?, mobile_number = ?, joining_date = ?, photo = ?, address = ?, specializations = ?, city = ?, state = ?, pincode = ?, country = ? WHERE id = ?"); 
        $stmt->bindParam(1, $name, PDO::PARAM_STR); 
        $stmt->bindParam(2, $mobileNumber, PDO::PARAM_STR); 
        $stmt->bindParam(3, $joiningDate, PDO::PARAM_STR); 
        $stmt->bindParam(4, $photo, PDO::PARAM_LOB); 
        $stmt->bindParam(5, $address, PDO::PARAM_STR); 
        $stmt->bindParam(6, json_encode($specialization), PDO::PARAM_STR); 
        $stmt->bindParam(7, $city, PDO::PARAM_STR); 
        $stmt->bindParam(8, $state, PDO::PARAM_STR); 
        $stmt->bindParam(9, $pincode, PDO::PARAM_STR); 
        $stmt->bindParam(10, $country, PDO::PARAM_STR); 
        $stmt->bindParam(11, $id, PDO::PARAM_INT); 
        // Execute statement 
        $stmt->execute(); 
        if($stmt->rowCount() > 0) {  
            return "Data updated successfully.";    
        } else {  
            return "Error updating data.";  
         } 
    }
    public function get_photo($id) {
        $photo = null;
        $stmt = $this->conn->prepare("SELECT photo FROM advocates WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $stmt->bindColumn('photo', $photo, PDO::PARAM_LOB);
            if ($stmt->fetch(PDO::FETCH_BOUND)) {
                return $photo;
            }
        }
        return null;
    }
} 

class ClientDetails {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getClientDetails($id) {
        $stmt = $this->conn->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

class updateClient
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function updateClientData($id, $name, $mobileNumber, $photo, $address, $document, $city, $state, $pincode)
    {
        $stmt = $this->conn->prepare("UPDATE clients SET name=:name, mobile_number=:mobileNumber, photo_name=:photo, address=:address, document_name=:document, city=:city, state=:state, pincode=:pincode WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':mobileNumber', $mobileNumber);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':document', $document);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':pincode', $pincode);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

class SelectAdvocate
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAdvocateNames()
    {
        $stmt = $this->conn->prepare("SELECT name,username FROM advocates");
        $stmt->execute();
        $advocateNames = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $advocateNames;
    }
}

class SelectClient
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getClientNames()
    {
        $stmt = $this->conn->prepare("SELECT name,username FROM clients");
        $stmt->execute();
        $clientNames = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientNames;
    }
}

class AddCase
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function saveCase($data)
    {
        $special_note = $data['special_note'] . ' - ' . $_SESSION['username'];
        $status="open";
        $sql = "INSERT INTO cases (case_number, filing_number, fillingDate, client, party_name, case_status, advocate, case_next_date, special_note,status) VALUES (:case_number, :ffiling_number, :fillingDate, :client, :party_name, :case_status, :advocate, :case_next_date, :special_note, :status)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':case_number', $data['case_number']);
        $stmt->bindParam(':ffiling_number', $data['ffiling_number']);
        $stmt->bindParam(':fillingDate', $data['fillingDate']);
        $stmt->bindParam(':client', $data['client']);
        $stmt->bindParam(':party_name', $data['party_name']);
        $stmt->bindParam(':case_status', $data['case_status']);
        $stmt->bindParam(':advocate', $data['advocate']);
        $stmt->bindParam(':case_next_date', $data['case_next_date']);
        $stmt->bindParam(':special_note', $special_note);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $paymentSql = "INSERT INTO payments (case_number, total_amount, transaction_id, payment) VALUES (:case_number, :total_amount, :transaction_id, :payment)";
        $paymentStmt = $this->conn->prepare($paymentSql);
        $paymentStmt->bindParam(':case_number', $data['case_number']);
        $paymentStmt->bindParam(':total_amount', $data['total_amount']);
        $paymentStmt->bindParam(':transaction_id', $data['transaction']);
        $paymentStmt->bindParam(':payment', $data['payment']);
    
    return $paymentStmt->execute();
    }
}

class CaseList
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getCases()
    {
        $stmt = $this->conn->prepare("SELECT * FROM cases");
        $stmt->execute();
        $cases = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cases as &$case) {
            $advocateName = $this->getAdvocateName($case['advocate']);
            $clientName = $this->getClientName($case['client']);
            $case['advocate'] = $advocateName;
            $case['client'] = $clientName;
        }
        return $cases;
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

class deleteCase {
    private $conn;
    private $table_name = "cases";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Function to delete a case by ID
    public function delete($id) {
        // SQL query to delete a case by ID
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            // Case deleted successfully
            return true;
        } else {
            // Error deleting case
            return false;
        }
    }
}

class totalCase {
    private $conn;
    private $table_name = "cases";
     public function __construct($db) {
        $this->conn = $db;
    }
     // Function to fetch total count of open and closed cases
    public function getTotalCount() {
        // SQL query to fetch total count of open cases
        $openQuery = "SELECT COUNT(*) as open_count FROM " . $this->table_name . " WHERE status = 'open'";
        $openStmt = $this->conn->prepare($openQuery);
        $openStmt->execute();
        $openRow = $openStmt->fetch(PDO::FETCH_ASSOC);
        $openCount = $openRow['open_count'];
         // SQL query to fetch total count of closed cases
        $closedQuery = "SELECT COUNT(*) as closed_count FROM " . $this->table_name . " WHERE status = 'closed'";
        $closedStmt = $this->conn->prepare($closedQuery);
        $closedStmt->execute();
        $closedRow = $closedStmt->fetch(PDO::FETCH_ASSOC);
        $closedCount = $closedRow['closed_count'];
         $totalCount = array(
            'open_cases' => $openCount,
            'closed_cases' => $closedCount
        );
         return $totalCount;
    }
}

class totalAdvocates {
    private $conn;
    private $table_name = "advocates";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Function to fetch total count of cases
    public function getTotalCount() {
        // SQL query to fetch total count of cases
        $query = "SELECT COUNT(*) as total_count FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total_count'];
    }
}

class getAllCaseDetails {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function getCases($id) {
        $stmt = $this->conn->prepare("SELECT * FROM cases WHERE id = ? ");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

class updateAllCase
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function saveCase($data)
    {
        $special_note = $data['special_note'];
        $sql = "UPDATE cases SET filing_number = :filing_number, fillingDate = :fillingDate, client = :client, party_name = :party_name, case_status = :case_status, advocate = :advocate, case_next_date = :case_next_date WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':filing_number', $data['ffiling_number']);
        $stmt->bindParam(':fillingDate', $data['fillingDate']);
        $stmt->bindParam(':client', $data['client']);
        $stmt->bindParam(':party_name', $data['party_name']);
        $stmt->bindParam(':case_status', $data['case_status']);
        $stmt->bindParam(':advocate', $data['advocate']);
        $stmt->bindParam(':case_next_date', $data['case_next_date']);
        $stmt->bindParam(':id', $data['id']);
        return $stmt->execute();
    }
}

class CaseDetails {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    // Method to get the case number for the current logged in user using the username from the session variable
    public function getCaseNumber() {
        $stmt = $this->conn->prepare("SELECT DISTINCT case_number FROM cases");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    // Method to get all the filling dates and case next dates for a given case number
    public function getCaseDates($caseNumber) {
        $stmt = $this->conn->prepare("SELECT fillingDate, case_next_date FROM cases WHERE case_number = ?");
        $stmt->bindParam(1, $caseNumber);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $fillingDates = array();
        $caseNextDates = array();
        foreach ($result as $row) {
            $fillingDates[] = $row['fillingDate'];
            $caseNextDates[] = $row['case_next_date'];
        }
        return array('fillingDates' => $fillingDates, 'caseNextDates' => $caseNextDates);
    }
}

class caseReport {
    private $conn;
     public function __construct($conn) {
        $this->conn = $conn;
    }
     public function getSpecialNotes($caseNumber, $startDate, $endDate) {
        $stmt = $this->conn->prepare("SELECT * FROM cases WHERE case_number = ? AND fillingdate >= ? AND case_next_date <= ?");
        $stmt->bindParam(1, $caseNumber);
        $stmt->bindParam(2, $startDate);
        $stmt->bindParam(3, $endDate);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

class AdminProfile {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function updateProfile($name, $email, $password, $phone, $file) {
        $user='admin';
        $stmt = $this->conn->prepare("UPDATE admin SET name = :name, email = :email, password = :password, phone = :phone, file = :file WHERE username= :username");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':file', $file);
        $stmt->bindParam(':username', $user);
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

class AdProfile{
    private $conn;
    private $username;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function displayUserInfo() {
        $username=$_SESSION['username'];
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}

class getPayment {
    private $db;
     public function __construct($conn) {
        $this->db = $conn;
    }
     public function getPaymentDetails($caseNumber) {
        $query = "SELECT * FROM cases WHERE case_number = :case_number";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':case_number', $caseNumber);
        $stmt->execute();
         $caseDetails = $stmt->fetch(PDO::FETCH_ASSOC);
         $query = "SELECT * FROM payments WHERE case_number = :case_number";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':case_number', $caseNumber);
        $stmt->execute();
         $paymentDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $result = array(
            'caseDetails' => $caseDetails,
            'paymentDetails' => $paymentDetails
        );
         echo json_encode($result);
    }
}


class CaseManager {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function getClosedCases() {
        $stmt = $this->conn->prepare("SELECT * FROM cases WHERE status = 'closed'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>