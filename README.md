# Task Management System

### A simple Task Management System built with PHP, MySQL, and XAMPP that allows users (admin and employees) to manage tasks, assign roles, track task progress, and receive notifications.

## Features

- User Role Management: Supports two roles - Admin and Employee.
- Task Management: Create, update, delete, and view tasks.
- Task Categorization: Filter tasks by status, and due date.
- Authentication and Authorization: Secure login system with role-based access control.
- Notifications: Notify users of assigned tasks and important updates.
- Task Filtering: Filter tasks by priority, status, deadline.
- Task Deadlines: Track due dates and overdue tasks.

## Requirements

- **XAMPP** (PHP, MySQL, Apache)
- **PHP** 7.4 or higher
- **MySQL** 5.7 or higher

## Installation

1. Download and install [XAMPP](https://www.apachefriends.org/index.html).
2. Clone or download this repository to your local server directory (e.g., `htdocs` in XAMPP).
3. Start Apache and MySQL from the XAMPP Control Panel.
4. Import the database:
   - Open **phpMyAdmin** in your browser (`http://localhost/phpmyadmin`).
   - Create a new database named **`task_management_db`**.
   - Import the provided `DB.sql` file.
5. Configure database connection:
   - Open the project folder and locate `Db_connection.php`.
   - Update database credentials if necessary.
6. Open the application in your browser:
   - Go to `http://localhost/task_management`.

## Database Structure

### Tables:

CREATE TABLE users (

);

CREATE TABLE tasks (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(100) NOT NULL,
discription TEXT,
assigned_to INT,
status ENUM('pending','in_progress','completed') DEFAULT 'pending',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (assigned_to) REFERENCES users(id)
);

CREATE TABLE notifications (
id INT AUTO_INCREMENT PRIMARY KEY,
message TEXT NOT NULL,
recipient INT NOT NULL,
type VARCHAR(50) NOT NULL,
date DATE NOT NULL,
is_read BOOLEAN DEFAULT FALSE
);

1. **users**

   - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
   - `full_name` (VARCHAR),
   - `username` (VARCHAR, UNIQUE),
   - `password` (VARCHAR),
   - `role` (ENUM: 'admin', 'employee'),
    -`created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

2. **tasks**

   - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
   - `title` (VARCHAR),
   - `description` (TEXT),
   - `assigned_to` INT,
   - `status` (ENUM: 'pending', 'in_progress', 'completed')
   - `due_date` (DATE)
   - `assigned_to` (INT, FOREIGN KEY REFERENCES users(id))

3. **notifications**
   - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
   - `message` (TEXT)
   - `recipient` INT NOT NULL,
   - `type` VARCHAR(50) NOT NULL,
   - `is_read` BOOLEAN DEFAULT FALSE,
   - `date` (TIMESTAMP DEFAULT CURRENT_TIMESTAMP)

## Login Credentials

### Default Admin User:

- **Username:** kuma
- **Password:** 1234

### Default Employee User:

- **Username:** korsiye
- **Password:** 1234

## Usage

- **Admin**
  - Manage users and assign roles.
  - Create, update, delete, and assign tasks.
  - View and track task progress.
  - dashboard interface ![image](https://github.com/user-attachments/assets/72687067-d4db-4afd-a577-6fa18c392c6f)
  - manage users ![image](https://github.com/user-attachments/assets/855ae4b3-665e-4a1d-a8bb-be5466f5696e)


  - create tasks![image](https://github.com/user-attachments/assets/9247214b-50b2-4d1e-af24-31e26869e24a)

  - All tasks ![image](https://github.com/user-attachments/assets/41ccac37-3f43-43fe-989f-e79b51c9873c)


  - 


    
- **Employee**
  - View assigned tasks.
  - Update task status and progress.
  - Receive notifications for task updates.
  -login![image](https://github.com/user-attachments/assets/9d2e87e1-6f2c-41e7-9aec-608c0ccc8ce4)
  - dashboard interface ![image](https://github.com/user-attachments/assets/cdd4f71e-e9e1-473d-968e-3d54116a358e)
  - my task inteface ![image](https://github.com/user-attachments/assets/c9f2308a-aa82-4b63-8612-3fa7a2d89fad)
 
  - profile interface ![image](https://github.com/user-attachments/assets/d258453c-7746-4830-8554-e1c77bf4e92d)

  - notifications interface ![image](https://github.com/user-attachments/assets/fc34f565-68a2-4b54-a872-7ea5e595bd7b)


