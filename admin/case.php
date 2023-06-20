<?php
require_once 'config/config.php';
require_once 'Database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addCase = new AddCase($conn);

    // Sanitize and validate user input
    $data = [
        'case_number' => filter_input(INPUT_POST, 'case_number', FILTER_SANITIZE_STRING),
        'ffiling_number' => filter_input(INPUT_POST, 'ffiling_number', FILTER_SANITIZE_STRING),
        'fillingDate' => filter_input(INPUT_POST, 'fillingDate', FILTER_SANITIZE_STRING),
        'client' => filter_input(INPUT_POST, 'client', FILTER_SANITIZE_STRING),
        'party_name' => filter_input(INPUT_POST, 'party_name', FILTER_SANITIZE_STRING),
        'case_status' => implode(',', $_POST['case']), // Assuming case_status is stored as a comma-separated string
        'advocate' => filter_input(INPUT_POST, 'advocate', FILTER_SANITIZE_STRING),
        'case_next_date' => filter_input(INPUT_POST, 'case_next_date', FILTER_SANITIZE_STRING),
        'special_note' => filter_input(INPUT_POST, 'special_note', FILTER_SANITIZE_STRING),
    ];

    // Save the form data to the database
    if ($addCase->saveCase($data)) {
        $success= "Case added successfully!";
        header("Location: add_case.php?success=".urlencode($success));

    } else {
        $error= "Error: Could not add case.";
        header("Location: add_case.php?error=".urlencode($error));
    }
}
?>