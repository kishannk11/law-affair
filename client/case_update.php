<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
require_once 'Database.php';
$insertmyCases = new InsertmyCases($conn); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $case_number= $_POST['case_number'];
    $filing_number = $_POST['ffiling_number'];
    //$fillingDate = $_POST['fillingDate'];
    $party_name = $_POST['party_name'];
    $case_status = implode(', ', $_POST['case']); // Convert the case status array to a string
    $case_next_date = $_POST['case_next_date'];
    $special_note = $_POST['special_note'];
    $total_amount = $_POST['total_amount'];
    $received_amount = $_POST['recieved_amount'];
    $pending_amount = $_POST['pending_amount'];
    $payment_mode = $_POST['payment'];
     // Check if the case was successfully inserted
    if ($insertmyCases->insertCase($case_number, $filing_number, $party_name, $case_status, $case_next_date, $special_note, $total_amount, $received_amount, $pending_amount, $payment_mode)) {
        $success="Case Updated";
        header("Location: case_list.php?success=".urlencode($success));
        exit;
    } else {
        $error="Error: Could not add case.";
        header("Location: case_list.php?error=".urlencode($error));
        exit;
    }
}
?>