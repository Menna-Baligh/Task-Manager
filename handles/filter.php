<?php
require_once '../classes/TaskManager.php' ;
session_start();

if(isset($_POST['filter']) && $_SERVER['REQUEST_METHOD']==='POST'){
    $taskManager = new TaskManager();
    $priority = $_POST['priority'];
    if($priority == 'All'){
        $tasks = $taskManager->tasksByUserId($_SESSION['user_id']);
    }else{
        $tasks = $taskManager->filterTasksByPriority($_POST['user_id'],$_POST['priority']);
    }
}
$_SESSION['tasks'] = serialize($tasks) ;
header('location:../public/home.php');
exit();