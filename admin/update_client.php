<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
require_once 'Database.php';
$updateClient = new updateClient($conn);
function getPreviousFileName($conn, $id, $column)
{
    $stmt = $conn->prepare("SELECT $column FROM clients WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row[$column];
}
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = htmlspecialchars($_POST['name']);
    $mobileNumber = htmlspecialchars($_POST['mobileNumber']);
    $address = htmlspecialchars($_POST['address']);
    $photo = $_FILES['photo'];
    $document = $_FILES['document'];
    $uploadDir = 'uploads/';
    $allowedPhotoFormats = array('jpg', 'jpeg', 'png');
    $allowedDocumentFormats = array('pdf', 'doc', 'docx');
     if (!empty($photo['name'])) {
        $photoExtension = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
        if (!in_array($photoExtension, $allowedPhotoFormats)) {
            header("Location: edit_client.php?id=" . $_POST["id"] . "&error=Invalid Photo Format");
            exit();
        }
        $photoPath = $uploadDir . basename($photo['name']);
        move_uploaded_file($photo['tmp_name'], $photoPath);
    } else {
        $photoPath = getPreviousFileName($conn, $id, 'photo_name'); // Use the previous photo's path
    }
     if (!empty($document['name'])) {
        $documentExtension = strtolower(pathinfo($document['name'], PATHINFO_EXTENSION));
        if (!in_array($documentExtension, $allowedDocumentFormats)) {
            header("Location: edit_client.php?id=" . $_POST["id"] . "&error=Invalid Document Format");
            exit();
        }
        $documentPath = $uploadDir . basename($document['name']);
        move_uploaded_file($document['tmp_name'], $documentPath);
    } else {
        $documentPath = getPreviousFileName($conn, $id, 'document_name'); // Use the previous document's path
    }
     if ($updateClient->updateClientData($id, $name, $mobileNumber, $photoPath, $address, $documentPath)) {
        header("Location: edit_client.php?id=" . $_POST["id"] . "&success=Client Updated");
    } else {
        header("Location: edit_client.php?error=Erorr in Updating");
    }
}
?>