<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
require_once 'config/session.php';
require_once 'Database.php';
$addCase = new updateAllCase($conn);
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $data = [
        'id' => filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING),
        'case_number' => filter_input(INPUT_POST, 'case_number', FILTER_SANITIZE_STRING),
        //'ffiling_number' => filter_input(INPUT_POST, 'ffiling_number', FILTER_SANITIZE_STRING),
        //'fillingDate' => filter_input(INPUT_POST, 'fillingDate', FILTER_SANITIZE_STRING),
        'client' => filter_input(INPUT_POST, 'client', FILTER_SANITIZE_STRING),
        'party_name' => filter_input(INPUT_POST, 'party_name', FILTER_SANITIZE_STRING),
        'case_status' => '',
        'advocate' => filter_input(INPUT_POST, 'advocate', FILTER_SANITIZE_STRING),
        //'case_next_date' => filter_input(INPUT_POST, 'case_next_date', FILTER_SANITIZE_STRING),
        //'total_amount' => filter_input(INPUT_POST, 'total_amount', FILTER_SANITIZE_STRING),
        //'recieved_amount' => filter_input(INPUT_POST, 'recieved_amount', FILTER_SANITIZE_STRING),
        //'pending_amount' => filter_input(INPUT_POST, 'pending_amount', FILTER_SANITIZE_STRING),
        //'payment' => filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING),
    ];
    // Check if case_status field is empty
    if (isset($_POST['case'])) {
        $data['case_status'] = implode(',', $_POST['case']); 
    } else {
        $errors['case_status'] = "Error: Case status field is required.";
    }
    if (empty($errors)) {
        // Save the form data to the database
        $caseId = $data['id']; // Save the case and get the case ID
        $isSaved = $addCase->saveCase($data); // Call the saveCase method
        if ($isSaved) {
            $success = "Case Updated";
            header("Location: edit_case.php?id=" . $caseId . "&success=" . urlencode($success));
        } else {
            $error = "Error: Could not add case.";
            header("Location: edit_case.php?error=" . urlencode($error));
        }
    }else {
        // Encode the error messages array as a JSON string and pass it as a URL parameter
        echo '<form id="errorForm" action="edit_case.php" method="post" style="display:none;">';
        foreach ($errors as $key => $value) {
            echo '<input type="hidden" name="errors[' . $key . ']" value="' . $value . '">';
        }
        echo '</form>';
        echo '<script>document.getElementById("errorForm").submit();</script>';
    }
}
?>