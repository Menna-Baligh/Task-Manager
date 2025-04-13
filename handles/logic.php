<?php
require_once 'app.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Registration
    if (isset($_POST['register'])) {
        unset($_POST['register']);
        $loginSystem->register($_POST['name'], $_POST['email'], $_POST['password']);
        $_SESSION['msg'] = "You have successfully registered.";
        header('Location: ../public/login.php');
        exit();
    }
    // Login
    elseif (isset($_POST['login'])) {
        $user = $loginSystem->login($_POST['email'], $_POST['password']);
        if ($user) {
            unset($_POST['login']);
            header('Location: ../public/home.php');
            exit();
        } else {
            $_SESSION['msg'] = "Invalid email or password. Please try again.";
            header('Location: ../public/login.php');
            exit();
        }
    }
    // logout
    elseif(isset($_POST['logout'])){
        $loginSystem->logout();
        header('Location: ../public/login.php');
        exit();
    }
    // Add Task
    elseif (isset($_POST['add']) && isset($_SESSION['user_id'])) {
        unset($_POST['add']);
        $taskManager->addNewTask(
            $_POST['title'],
            $_POST['discription'], 
            $_POST['priority'],
            $_POST['due_date'],
            $_SESSION['user_id']
        );
        header('Location: ../public/home.php');
        exit();
    }
    // Edit Task
    elseif (isset($_POST['save'])) {
        unset($_POST['save']);
        $taskManager->editTask(
            $_POST['id'],
            $_POST['title'],
            $_POST['discription'],
            $_POST['priority'],
            $_POST['due_date'],
            $_POST['status'],
            $_POST['user_id']
        );
        header('Location: ../public/home.php');
        exit();
    }
    // Delete Task
    elseif (isset($_POST['delete'])) {
        unset($_POST['delete']);
        $taskManager->deleteTask($_POST['id'], $_POST['user_id']);
        header('Location: ../public/home.php');
        exit();
    }
    // Filter Tasks
    elseif (isset($_POST['filter'])) {
        unset($_POST['filter']);
        $priority = $_POST['priority'];
        if ($priority == 'All') {
            $tasks = $taskManager->tasksByUserId($_SESSION['user_id']);
        } else {
            $tasks = $taskManager->filterTasksByPriority($_POST['user_id'], $_POST['priority']);
        }
        $_SESSION['tasks'] = serialize($tasks);
        header('Location: ../public/home.php');
        exit();
    }
}

// Default redirect 
if (isset($_SESSION['user_id'])) {
    header('Location: ../public/home.php');
} else {
    header('Location: ../public/login.php');
}
exit();
?>