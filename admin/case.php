<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
require_once 'config/session.php';
require_once 'Database.php';
$addCase = new AddCase($conn);
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $data = [
        'case_number' => '',
        'ffiling_number' => '',
        'fillingDate' => '',
        'client' => '',
        'party_name' => '',
        'case_status' => '',
        'advocate' => '',
        'case_next_date' => '',
        'special_note' => '',
        'total_amount' => '',
        'recieved_amount' => '',
        'pending_amount' => '',
        'payment' => '',
    ];
    // Check if any field is empty
    foreach ($data as $key => $value) {
        if ($key == 'case_status') {
            if (isset($_POST['case'])) {
                $data['case_status'] = implode(',', $_POST['case']); // Assuming case_status is stored as a comma-separated string
            } else {
                $errors[$key] = "Error: " . ucfirst($key) . " field is required.";
            }
        } else {
            if (empty($_POST[$key]) && $key !== 'special_note') {
                $errors[$key] = "Error: " . ucfirst($key) . " field is required.";
            } else {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
            }
        }
    }
    if (empty($errors)) {
        // Save the form data to the database
        if ($addCase->saveCase($data)) {
            $success = "Case added successfully!";
            header("Location: add_case.php?success=" . urlencode($success));
        } else {
            $error = "Error: Could not add case.";
            header("Location: add_case.php?error=" . urlencode($error));
        }
    } else {
        // Encode the error messages array as a JSON string and pass it as a URL parameter
        echo '<form id="errorForm" action="add_case.php" method="post" style="display:none;">';
        foreach ($errors as $key => $value) {
            echo '<input type="hidden" name="errors[' . $key . ']" value="' . $value . '">';
        }
        echo '</form>';
        echo '<script>document.getElementById("errorForm").submit();</script>';
    }
}
?>