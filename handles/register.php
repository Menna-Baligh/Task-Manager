<?php
require_once "../classes/LoginSystem.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
    
    $loginSystem = new LoginSystem();
    $loginSystem->register($_POST['name'], $_POST['email'], $_POST['password']);
    $_SESSION['msg'] = "You have successfully registered.";
    header('location:../public/login.php');
    exit();
}else{
    echo "hi";

}