<?php
require_once 'config/config.php';
require_once 'Database.php';
$deleteCase = new deleteCase($conn);

// Check if ID is set in the GET method
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Call the delete function to delete the case
    if ($deleteCase->delete($id)) {
        // Case deleted successfully
        $success= "Case deleted successfully.";
        header("Location: case_list.php?success=" . urlencode($success));
    } else {
        // Error deleting case
        $error= "Error deleting case.";
        header("Location: case_list.php?error=" . urlencode($error));
    }
} else {
    // ID not set in GET method
    $error= "ID not set.";
    header("Location: case_list.php?error=" . urlencode($error));
}
?>