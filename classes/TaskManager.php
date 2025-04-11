<?php
require_once 'Database.php';
require_once 'Task.php';

class TaskManager {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    public function addNewTask($title, $description, $priority, $dueDate, $userId) {
        $query = "INSERT INTO tasks (title, description, priority, due_date, user_id, status) VALUES (?, ?, ?, ?, ?, 'Pending')";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $title, $description, $priority, $dueDate, $userId);
        $stmt->execute();
        $stmt->close();
    }

    public function tasksByUserId($userId) {
        $query = "SELECT * FROM tasks WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $tasks = [];
        while ($row = $result->fetch_assoc()) {
            $tasks[] = new Task(
                $row['id'],
                $row['title'],
                $row['description'],
                $row['priority'],
                $row['due_date'],
                $row['user_id'],
                $row['status']
            );
        }
        $stmt->close();
        return $tasks;
    }

    
    public function editTask($id, $title, $description, $priority, $dueDate, $status, $userId) {
        $query = "UPDATE tasks SET title = ?, description = ?, priority = ?, due_date = ?, status = ? WHERE id = ? AND user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssii", $title, $description, $priority, $dueDate, $status, $id, $userId);
        $stmt->execute();
        $stmt->close();
    }

    
    public function deleteTask($id, $userId) {
        $query = "DELETE FROM tasks WHERE id = ? AND user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $id, $userId);
        $stmt->execute();
        $stmt->close();
    }

    
    public function filterTasksByPriority($userId, $priority) {
        $query = "SELECT * FROM tasks WHERE user_id = ? AND priority = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $userId, $priority);
        $stmt->execute();
        $result = $stmt->get_result();
        $tasks = [];
        while ($row = $result->fetch_assoc()) {
            $tasks[] = new Task(
                $row['id'],
                $row['title'],
                $row['description'],
                $row['priority'],
                $row['due_date'],
                $row['user_id'],
                $row['status']
            );
        }
        $stmt->close();
        return $tasks;
    }
    public function getTaskById($taskId, $userId) {
        $query = "SELECT * FROM tasks WHERE id = ? AND user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $taskId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Task(
                $row['id'],
                $row['title'],
                $row['description'],
                $row['priority'],
                $row['due_date'],
                $row['user_id'],
                $row['status']
            );
        }
        return null;
    }
}