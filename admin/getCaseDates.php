<?php
// Include the config.php file to establish a database connection
include 'config/config.php';
include 'Database.php';
$caseDetails = new CaseDetails($conn);
// Get the case number from the POST data
$caseNumber = $_POST['caseNumber'];
// Get the filling date and case next date for the given case number
$caseDates = $caseDetails->getCaseDates($caseNumber);
// Return the case dates as JSON
echo json_encode($caseDates);

?>