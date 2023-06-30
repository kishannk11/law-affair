<?php
require_once 'config/config.php';
require_once 'config/session.php';
require_once 'Database.php';

$client = new Client($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $client->sanitizeInput($_POST['name']);
    $mobileNumber = $client->sanitizeInput($_POST['mobileNumber']);
    $address = $client->sanitizeInput($_POST['address']);
    $city = $client->sanitizeInput($_POST['city']); // Added parameter
    $state = $client->sanitizeInput($_POST['state']); // Added parameter
    $pincode = $client->sanitizeInput($_POST['pincode']); // Added parameter
    $username = 'CLNT' . rand(1000, 9999);

    if ($client->validateName($name) && $client->validateMobileNumber($mobileNumber) && $client->validateAddress($address)) {
        $photo = 'uploads/' . basename($_FILES['photo']['name']);
        $document = 'uploads/' . basename($_FILES['document']['name']);

        if ($client->uploadFile($_FILES['photo'], $photo) && $client->uploadFile($_FILES['document'], $document)) {
            if ($client->addClient($name, $mobileNumber, $photo, $address, $document, $username, $city, $state, $pincode)) {
                $success = "Client added successfully.";
                header("Location: client.php?success=" . urlencode($success));
            } else {
                $error = "Error: Could not add client.";
                header("Location: client.php?error=" . urlencode($error));
            }
        } else {
            $error = "Error: Could not upload files.";
            header("Location: client.php?error=" . urlencode($error));
        }
    } else {
        $error = "All fields required";
        header("Location: client.php?required=" . urlencode($error));
    }
}
?>