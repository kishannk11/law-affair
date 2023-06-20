<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/config.php';
 class Client {
    private $conn;
     public function __construct($servername, $dbname, $username, $password) {
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
     public function delete($id) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM clients WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
     public function closeConnection() {
        $this->conn = null;
    }
}
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $client = new Client($servername, $dbname, $username, $password);
    if ($client->delete($id)) {
        $success = "Client deleted successfully";
        //echo $success;
        header("Location: client_list.php?success=".urlencode($success));
    } else {
        $error= "Error deleting client";
        //echo $error;
        header("Location: client_list.php?error=".urlencode($error));
    }
    $client->closeConnection();
} else {
    $error=  "No client ID provided";
    //echo $error;
    header("Location: client_list.php?error=".urlencode($error));
}
?>