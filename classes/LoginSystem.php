<?php
require_once 'Database.php' ;
require_once 'User.php';
session_start();
class LoginSystem {
    private $conn ; 

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function register($name, $email, $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (`name`, `email`, `password`) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $name, $email, $password);
        $stmt->execute();
        $stmt->close();
    }

    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        if($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return new User($user['id'], $user['name'], $user['email']);
        }
        return false ;
    }

    public function logout(){
        unset($_SESSION['user_id']);
        session_destroy();
    }
    
    

}