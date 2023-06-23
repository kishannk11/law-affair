<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
require_once 'config/config.php';
require_once 'config/session.php'; 
require_once 'Database.php'; 
 if (isset($_GET['id'])) { 
    $id = $_GET['id']; 
     $delete_advocate = new DeleteAdvocate($servername, $dbname, $username, $password); 
    if ($delete_advocate->delete($id)) { 
        $success = "Advocate deleted successfully"; 
        header("Location: advocate-list.php?success=".urlencode($success)); 
    } else { 
        $erorr= "Error deleting advocate"; 
        header("Location: advocate-list.php?error=".urlencode($error)); 
    } 
    $delete_advocate->closeConnection(); 
} else { 
    $erorr=  "No advocate ID provided"; 
    header("Location: advocate-list.php?error=".urlencode($error)); 
} 
?>