<?php
class User {
    private $db;
     public function __construct($db) {
        $this->db = $db;
    }
     public function authenticate($username, $password) {
        $user = $this->db->getUserByUsername($username);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
?>