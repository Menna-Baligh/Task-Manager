<?php
class Database{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "task_manager";
    private $port = 3307;
    private $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
        if($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function getConnection(){
        return $this->conn;
    }
}