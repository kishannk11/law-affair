<?php
include 'config/config.php';
include 'Database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$adminProfile = new AdminProfile($conn);
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = htmlspecialchars($_POST['phone']);
    $file = $_FILES['file']['name'];
    
    // Upload file
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Validate file type
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    if(in_array($fileType, $allowedTypes)){
        move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
        if($adminProfile->updateProfile($name, $email, $password, $phone, $file)) {
            echo "Profile updated successfully!";
        } else {
            echo "Error updating profile!";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
}
?>