<?php
include "config/config.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the payment details from the form
    $pendingAmount = $_POST['amount'];
    $paymentMode = $_POST['payment'];
    $transactionId = $_POST['transaction'];
    $case_number=$_POST['case_number'];

    // Insert the payment details into the database
    $stmt = $conn->prepare("INSERT INTO payments (case_number, total_amount, payment, transaction_id) VALUES ( ?, ?, ?, ?)");
    $stmt->execute([$case_number, $pendingAmount, $paymentMode, $transactionId]);

    if ($stmt) {
        // Success message
        $response = [
            'status' => 'success',
            'message' => 'Payment added successfully!'
        ];
    } else {
        // Error message
        $response = [
            'status' => 'error',
            'message' => 'Failed to add payment.'
        ];
    }

    echo json_encode($response);
    exit;
}

?>