<?php
class Task {
    private $id;
    private $title;
    private $description;
    private $priority;
    private $dueDate;
    private $userId;
    private $status;

    public function __construct($id, $title, $description, $priority, $dueDate, $userId, $status = 'Pending') {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->priority = $priority;
        $this->dueDate = $dueDate;
        $this->userId = $userId;
        $this->status = $status;
    }

    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getDescription() { return $this->description; }
    public function getPriority() { return $this->priority; }
    public function getDueDate() { return $this->dueDate; }
    public function getUserId() { return $this->userId; }
    public function getStatus() { return $this->status; }
}