<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
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
        $photo = null;
        $allowed_types = array('jpg', 'jpeg', 'png');
        $file_type = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
        if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK && in_array($file_type, $allowed_types)) {
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $photo = file_get_contents($tmp_name);
        } else {
            $photo_error = "Error uploading photo. Only JPG, JPEG, PNG, and GIF file types are allowed.";
            header("Location: add_advocate.php?error=" . urlencode($photo_error));
            //return;
        }

        // Add advocate data to the database
        $addAdvocate->addAdvocateData($_POST["name"], $_POST["mobileNumber"], $_POST["joiningDate"], $photo, $_POST["address"], $_POST["lawyer"]);
        $success = $addAdvocate->getSuccessMessage();
        header("Location: add_advocate.php?succes=" . urlencode($success));

    } else {
        // Encode the error messages array as a JSON string and pass it as a URL parameter
        $json_errors = json_encode($errors);
        echo '<form id="errorForm" action="add_advocate.php" method="post" style="display:none;">';
        foreach ($errors as $key => $value) {
            echo '<input type="hidden" name="errors[' . $key . ']" value="' . $value . '">';
        }
        echo '</form>';
        echo '<script>document.getElementById("errorForm").submit();</script>';
    }
}
?>