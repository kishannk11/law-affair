<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 
require_once 'config/config.php'; 
require_once 'Database.php'; 
if (isset($_GET['id'])) { 
    $id = $_GET['id']; 
    $delete_client = new Delete_Client($servername, $dbname, $username, $password); 
    if ($delete_client->delete($id)) { 
        $success = "Client deleted successfully"; 
        //echo $success; 
        header("Location: client_list.php?success=".urlencode($success)); 
    } else { 
        $error= "Error deleting client"; 
        //echo $error; 
        header("Location: client_list.php?error=".urlencode($error)); 
    } 
    $delete_client->closeConnection(); 
} else { 
    $error=  "No client ID provided"; 
    //echo $error; 
    header("Location: client_list.php?error=".urlencode($error)); 
} 
?>