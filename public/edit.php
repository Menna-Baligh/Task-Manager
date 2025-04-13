<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="style/edit.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <h1>
                <span class="logo">✓</span>Task-Manager
            </h1>
        </header>

        <!-- Edit Task Form -->
        <h2>Edit Task</h2>
        <?php
            include_once '../classes/TaskManager.php';
            session_start();
            $taskManager = new TaskManager();
            $task = $taskManager->getTaskById($_GET['id'], $_SESSION['user_id']);
        ?>
        <form class="edit-task-form" method="post" action="../handles/logic.php">
            <div class="task-input-group">
                <input type="hidden" name="id" value="<?php echo $task->getId()?>">
                <input type="hidden" name="user_id" value="<?php echo $task->getUserId()?>">
                <input type="text" name="title" value="<?php echo $task->getTitle(); ?>" required>
                <input type="text" name="discription" value="<?php echo $task->getDescription(); ?>"required >
                <input type="date" name="due_date" value="<?php echo $task->getDueDate(); ?>">
                
                <?php
                    if ($task->getStatus() == 'pending') {?>
                        <select name="status">
                            <option value="Pending" selected>Pending</option>
                            <option value="Completed">Completed</option>
                        </select>
                    <?php }else{?>
                        <select name="status">
                            <option value="Pending">Pending</option>
                            <option value="Completed" selected>Completed</option>
                        </select>
                    <?php }
                ?>
                
                <label>Priority:
                    <select name="priority">
                        <option value="High" <?php if($task->getPriority() == 'High')echo "selected"?>>High</option>
                        <option value="Medium" <?php if($task->getPriority() == 'Medium')echo "selected"?>>Medium</option>
                        <option value="Low" <?php if($task->getPriority() == 'Low')echo "selected"?>>Low</option>
                    </select>
                </label>
            </div>
            <div class="form-actions">
                <button type="submit" name="save" class="save-btn">Save</button>
                <a href="home.php" class="cancel-btn">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>