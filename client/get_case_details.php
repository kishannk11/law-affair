<?php
include 'config/config.php';
include 'Database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$caseNumber = $_POST['caseNumber']; 
$getPayment = new getPayment($conn); 
$getPayment->getPaymentDetails($caseNumber);

?>