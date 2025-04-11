<?php
require_once "../classes/TaskManager.php" ;

if(isset($_POST['save']) && $_SERVER['REQUEST_METHOD']=='POST'){
    $taskManager = new TaskManager();
    $taskManager->editTask($_POST['id'],$_POST['title'],$_POST['discription'],$_POST['priority'],$_POST['due_date'],$_POST['status'],$_POST['user_id']);
    
}
header('location:../public/home.php');
exit();