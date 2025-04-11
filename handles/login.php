<?php
require_once '../classes/LoginSystem.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])){
    
    $loginSystem = new LoginSystem();
    $user = $loginSystem->login($_POST['email'], $_POST['password']);
    if($user) {
        header('location:../public/home.php');
        exit();
    } else {
        $_SESSION['msg'] = "Invalid email or password. Please try again.";
        header('location:../public/login.php');
        exit();
    }
    


}