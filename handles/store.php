<?php
    require_once '../classes/TaskManager.php';
    session_start();
    if(isset($_POST['add']) && $_SERVER['REQUEST_METHOD']=='POST'&& isset($_SESSION['user_id'])) {
        $taskManager = new TaskManager();
        $taskManager->addNewTask($_POST['title'], $_POST['discription'], $_POST['priority'], $_POST['due_date'], $_SESSION['user_id']);
        
    }
    header('Location: ../public/home.php');
    exit();
