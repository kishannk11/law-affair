<?php
include "config/config.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the payment details from the form
    $totalAmount = $_POST['total_amount'];
    $receivedAmount = $_POST['recieved_amount'];
    $pendingAmount = $_POST['pending_amount'];
    $paymentMode = $_POST['payment'];
    $transactionId = $_POST['transaction'];
    $case_number=$_POST['case_number'];

    // Insert the payment details into the database
    $stmt = $conn->prepare("INSERT INTO payments (case_number, total_amount, received_amount, pending_amount, payment, transaction_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$case_number, $totalAmount, $receivedAmount, $pendingAmount, $paymentMode, $transactionId]);

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