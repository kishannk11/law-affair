<?php
require_once 'config/config.php';
require_once 'client_file.php';
 $client = new Client($conn);
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $client->sanitizeInput($_POST['name']);
    $mobileNumber = $client->sanitizeInput($_POST['mobileNumber']);
    $address = $client->sanitizeInput($_POST['address']);
     if ($client->validateName($name) && $client->validateMobileNumber($mobileNumber) && $client->validateAddress($address)) {
        $photo = 'uploads/' . basename($_FILES['photo']['name']);
        $document = 'uploads/' . basename($_FILES['document']['name']);
         if ($client->uploadFile($_FILES['photo'], $photo) && $client->uploadFile($_FILES['document'], $document)) {
            if ($client->addClient($name, $mobileNumber, $photo, $address, $document)) {
                echo "Client added successfully.";
            } else {
                echo "Error: Could not add client.";
            }
        } else {
            echo "Error: Could not upload files.";
        }
    } else {
        echo "Error: Invalid input.";
    }
}
?>
?>