# Task Manager
A simple PHP-based Task Management System that allows users to register , login and Manage their tasks with priorities and filters

---

## File Overview

### **1. classes/**
- `Database.php` : Handles the database connection using mysqli
- `LoginSystem.php` : Manages login and registration logic.
- `User.php` : Represents the user entity and related functions. 
- `Task.php` : Represents the Task entity and related functions. 
- `TaskManager` : CRUD and filter on Tasks

### **2. Handles/**
- this folder contains the logic in `logic.php` and usage of classes we made in `app.php`

### **3. public/**
- All front-end code i use in this folder

### **4. sql/**
- Contains the database schema to create tables

---

## Features

- ✅ User Management: Each task is assigned to a user.
- ✅ Task Operations: Add, edit, delete, and list tasks.
- ✅ Priority Levels: Assign priority (High, Medium, Low).
- ✅ OOP Principles: Use classes, constructors, and encapsulation.
- ✅ Data Storage: Store tasks in MySQL database.

## Bonus Features:
- ⭐️ Implement a task filtering system based on priority.
- ⭐️ Add a due date feature for tasks.
- ⭐️ Create a simple login system for users.

---
## Technologies Used
- Native PHP
- MySQL
- HTML/CSS

---
## How to Run

1. Clone the repository or download it.
2. Import the SQL file to your MySQL server.
3. Run the project in XAMPP or any local server.
4. Access the app via http://localhost/Task-Manager/public/login.php
---
## Template
[login-form](https://www.codingnepalweb.com/make-simple-login-form-html-css/)