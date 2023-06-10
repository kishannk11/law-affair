<?php
class User {
    private $db;
     public function __construct($db) {
        $this->db = $db;
    }
     public function authenticate($username, $password) {
        return $this->db->getUserByUsernameAndPassword($username, $password);
    }
}
?>