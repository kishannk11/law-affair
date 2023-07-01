<?php
include 'config/config.php';
// Assuming you have a database connection established
 // Check if the caseNumber parameter is set
if (isset($_POST['caseNumber'])) {
    $caseNumber = $_POST['caseNumber'];
     // Update the case status to "closed" in the cases table
    $stmt = $conn->prepare("UPDATE cases SET status = 'closed' WHERE case_number = ?");
    $stmt->bindParam(1, $caseNumber);
    $stmt->execute();
     // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>