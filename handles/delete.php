<?php
require_once '../classes/TaskManager.php' ;
if(isset($_POST['delete']) && $_SERVER['REQUEST_METHOD']==='POST'){
    $taskManager = new TaskManager();
    $taskManager->deleteTask($_POST['id'],$_POST['user_id']);
}
header('location:../public/home.php');
exit();