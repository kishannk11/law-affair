<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 require_once 'config/config.php';
 class Advocate {
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
            $stmt = $this->conn->prepare("DELETE FROM advocates WHERE id = :id");
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
     $advocate = new Advocate($servername, $dbname, $username, $password);
    if ($advocate->delete($id)) {
        $success = "Advocate deleted successfully";
        header("Location: advocate-list.php?success=".urlencode($success));
    } else {
        $erorr= "Error deleting advocate";
        header("Location: advocate-list.php?error=".urlencode($error));
    }
    $advocate->closeConnection();
} else {
    $erorr=  "No advocate ID provided";
    header("Location: advocate-list.php?error=".urlencode($error));
}
?>