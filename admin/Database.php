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
     public function addAdvocateData($name, $mobileNumber, $joiningDate, $photo, $address, $specialization, $username, $password)
    {
        // Validate and sanitize input data
        $name = $this->validateInput($name);
        $mobileNumber = $this->validateInput($mobileNumber);
        $joiningDate = $this->validateInput($joiningDate);
        $address = $this->validateInput($address);
        $username = $this->validateInput($username);
        $password = $this->validateInput($password);
        // Validate and sanitize specialization array
        $specialization = array_map(array($this, 'validateInput'), $specialization);
        // Prepare and bind SQL statement
        $stmt = $this->conn->prepare("INSERT INTO advocates (name, mobile_number, joining_date, photo, address, specializations, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $mobileNumber, PDO::PARAM_STR);
        $stmt->bindParam(3, $joiningDate, PDO::PARAM_STR);
        $stmt->bindParam(4, $photo, PDO::PARAM_LOB);
        $stmt->bindParam(5, $address, PDO::PARAM_STR);
        $stmt->bindParam(6, json_encode($specialization), PDO::PARAM_STR);
        $stmt->bindParam(7, $username, PDO::PARAM_STR);
        $stmt->bindParam(8, $password, PDO::PARAM_STR);
        // Execute statement
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $this->succes = "Data inserted successfully.";
        } else {
            $this->succes = "Error inserting data.";
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
    public function addClient($name, $mobileNumber, $photo, $address, $document, $username) 
    { 
        $stmt = $this->conn->prepare("INSERT INTO clients (name, mobile_number, photo_name, address, document_name, username) VALUES (?, ?, ?, ?, ?, ?)"); 
        $stmt->bindParam(1, $name); 
        $stmt->bindParam(2, $mobileNumber); 
        $stmt->bindParam(3, $photo); 
        $stmt->bindParam(4, $address); 
        $stmt->bindParam(5, $document); 
        $stmt->bindParam(6, $username); 
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

    public function update_advocate($id, $name, $mobileNumber, $joiningDate, $photo, $address, $specialization) { 
        // Validate and sanitize input data 
        $name = $this->sanitize_input($name); 
        $mobileNumber = $this->sanitize_input($mobileNumber); 
        $joiningDate = $this->sanitize_input($joiningDate); 
        $address = $this->sanitize_input($address); 
        // Validate and sanitize specialization array 
        $specialization = array_map(array($this, 'sanitize_input'), $specialization); 
        // Prepare and bind SQL statement 
        $stmt = $this->conn->prepare("UPDATE advocates SET name = ?, mobile_number = ?, joining_date = ?, photo = ?, address = ?, specializations = ? WHERE id = ?"); 
        $stmt->bindParam(1, $name, PDO::PARAM_STR); 
        $stmt->bindParam(2, $mobileNumber, PDO::PARAM_STR); 
        $stmt->bindParam(3, $joiningDate, PDO::PARAM_STR); 
        $stmt->bindParam(4, $photo, PDO::PARAM_LOB); 
        $stmt->bindParam(5, $address, PDO::PARAM_STR); 
        $stmt->bindParam(6, json_encode($specialization), PDO::PARAM_STR); 
        $stmt->bindParam(7, $id, PDO::PARAM_INT); 
        // Execute statement 
        $stmt->execute(); 
        if($stmt->rowCount() > 0) {  
            return "Data updated successfully.";    
        } else {  
            return "Error updating data.";  
         } 
    } 
} 
?>