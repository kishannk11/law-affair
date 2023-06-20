<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
require_once 'Database.php';
$updateAdvocate = new UpdateAdvocate($conn); 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if ($_FILES["photo"]["error"] == UPLOAD_ERR_OK) { 
        $tmp_name = $_FILES["photo"]["tmp_name"]; 
        $photo = file_get_contents($tmp_name); 
    } else if ($_FILES["photo"]["error"] == UPLOAD_ERR_NO_FILE) { 
        // No new photo has been uploaded, use the previous photo
        $photo = $updateAdvocate->get_photo($_POST["id"]);
    } else { 
        $error="Error uploading photo.";
        header("Location: edit_advocate.php?id=" . $_POST["id"] . "&error=" . urlencode($error));  
        return; 
    } 
    // Update advocate data in the database 
    $success = $updateAdvocate->update_advocate($_POST["id"], $_POST["name"], $_POST["mobileNumber"], $_POST["joiningDate"], $photo, $_POST["address"], $_POST["lawyer"]); 
    header("Location: edit_advocate.php?id=" . $_POST["id"] . "&succes=" . urlencode($success)); 
}
?>