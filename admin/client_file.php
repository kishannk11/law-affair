<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
?>