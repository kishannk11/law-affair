<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
class AddAdvocate
{
    private $conn;
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
    public function addAdvocateData($name, $mobileNumber, $joiningDate, $photo, $address, $specialization)
    {
        // Validate and sanitize input data
        $name = $this->validateInput($name);
        $mobileNumber = $this->validateInput($mobileNumber);
        $joiningDate = $this->validateInput($joiningDate);
        $address = $this->validateInput($address);
        // Validate and sanitize specialization array
        $specialization = array_map(array($this, 'validateInput'), $specialization);
        // Prepare and bind SQL statement
        $stmt = $this->conn->prepare("INSERT INTO advocates (name, mobile_number, joining_date, photo, address, specializations) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->bindParam(2, $mobileNumber, PDO::PARAM_STR);
        $stmt->bindParam(3, $joiningDate, PDO::PARAM_STR);
        $stmt->bindParam(4, $photo, PDO::PARAM_LOB);
        $stmt->bindParam(5, $address, PDO::PARAM_STR);
        $stmt->bindParam(6, json_encode($specialization), PDO::PARAM_STR);
        // Execute statement
        $stmt->execute();
    }
}
$addAdvocate = new AddAdvocate($conn);
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled in
    if (empty($_POST["name"])) {
        $errors["name"] = "Please enter a name.";
    }
    if (empty($_POST["mobileNumber"])) {
        $errors["mobileNumber"] = "Please enter a mobile number.";
    }
    if (empty($_POST["joiningDate"])) {
        $errors["joiningDate"] = "Please enter a joining date.";
    }
    if (empty($_POST["address"])) {
        $errors["address"] = "Please enter an address.";
    }
    if (empty($_FILES["photo"])) {
        $errors["photo"] = "Please upload a photo.";
    }
    if (empty($_POST["lawyer"])) {
        $errors["lawyer"] = "Please select a specialization.";
    }

    if (empty($errors)) {
        // Handle file upload
        $photo = null;
        if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $photo = file_get_contents($tmp_name);
        } else {
            echo "Error uploading photo.";
            return;
        }

        // Add advocate data to the database
        $addAdvocate->addAdvocateData($_POST["name"], $_POST["mobileNumber"], $_POST["joiningDate"], $photo, $_POST["address"], $_POST["lawyer"]);
        
    }
}
?>