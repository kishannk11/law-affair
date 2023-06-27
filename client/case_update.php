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
    $fillingDate = $_POST['fillingDate'];
    $party_name = $_POST['party_name'];
    $case_status = implode(', ', $_POST['case']); // Convert the case status array to a string
    $case_next_date = $_POST['case_next_date'];
    $special_note = $_POST['special_note'];
    $insertmyCases->insertCase($case_number,$filing_number, $fillingDate,  $party_name, $case_status, $case_next_date, $special_note);
}
?>