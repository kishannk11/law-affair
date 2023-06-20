<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
require_once 'Database.php';

$updateAdvocate = new UpdateAdvocate($conn); 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 

        $photo = null; 
        if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) { 
            $tmp_name = $_FILES["photo"]["tmp_name"]; 
            $photo_name = $_FILES["photo"]["name"];
            $photo_path = "uploads/" . $photo_name;
            move_uploaded_file($tmp_name, $photo_path);
            $photo = file_get_contents($photo_path); 
        } else { 
            echo "Error uploading photo."; 
            return; 
        } 
        // Update advocate data in the database 
        $success = $updateAdvocate->update_advocate($_POST["id"], $_POST["name"], $_POST["mobileNumber"], $_POST["joiningDate"], $photo, $_POST["address"], $_POST["lawyer"]); 
        header("Location: edit_advocate.php?id=" . $_POST["id"] . "&success=" . urlencode($success)); 
    
}
?>