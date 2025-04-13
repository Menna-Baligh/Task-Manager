<?php session_start(); ?>
<?php if(!isset($_SESSION['user_id'])) header('Location: ../public/login.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <h1>
                <span class="logo">✓</span>Task-Manager
            </h1><br>
            <form action="../handles/logic.php" method="post">
                <button type="submit" name="logout" class="delete-btn">Logout</button>
            </form>
        </header>

        <!-- Add Task Form -->
        <form class="add-task-form" method="post" action="../handles/logic.php">
            <div class="task-input-group">
                <input type="text" name="title" placeholder="Task title" required>
                <input type="text" name="discription" placeholder="Add new .." required>
                <label>Priority:
                    <select name="priority">
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </label>
                <input type="date" name="due_date" class="date-picker-icon" required>
            </div>
            <button type="submit" name="add" class="add-btn">Add</button>
        </form>
        <!-- Filter/Sort Bar -->
        <div class="filter-bar">
            <form action="../handles/logic.php" method="post">
                <div class="filter-form">
                    <label>Filter:
                        <select name="priority">
                            <option value="All">ALL</option>
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </label>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <button type="submit" name="filter">Filter</button>
                </div>
            </form>
            
        </div>
        <?php
                require_once '../classes/TaskManager.php' ;
            
            if(isset($_SESSION['tasks'])){
                $tasks = unserialize($_SESSION['tasks']);
                unset($_SESSION['tasks']);
            }else{
                $taskManager = new TaskManager();
                $tasks = $taskManager->tasksByUserId($_SESSION['user_id']);
            }
        ?>
        <!-- Task List -->
        <ul class="task-list">
                    
            <?php
                foreach ($tasks as $task) {?>
                    <li class="task-item">
                        
                        <span class="task-title"><?php echo $task->getTitle(); ?></span>
                        <span class="task-title"><?php echo $task->getDescription(); ?></span>
                        <?php
                            if ($task->getPriority() == 'High') {
                                echo '<span class="priority priority-high">' . $task->getPriority() . '</span>';
                            } elseif ($task->getPriority() == 'Medium') {
                                echo '<span class="priority priority-medium">' . $task->getPriority() . '</span>';
                            } else {
                                echo '<span class="priority priority-low">' . $task->getPriority() . '</span>';
                            }
                        ?>
                        
                        <span class="due-date"><?php echo $task->getDueDate(); ?></span>
                        <div class="task-actions">
                            <a href="edit.php?id=<?php echo $task->getId(); ?>" class="edit-btn">Edit</a>
                            <form action="../handles/logic.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $task->getId(); ?>">
                                <input type="hidden" name="user_id" value="<?php echo $task->getUserId(); ?>">
                                <button type="submit" name="delete" class="delete-btn">Delete</button>
                            </form>
                        </div>
                    </li>
                <?php }
            ?>
            
        </ul>
    </div>
</body>
</html>