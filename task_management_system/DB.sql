CREATE DATABASE task_management_db;
USE task_management_db;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(50) NOT NULL,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(250) NOT NULL,
  role ENUM ('admin','employe') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (full_name,username,password,role) VALUES("Kuma Worku","kuma","1234","admin");
INSERT INTO users (full_name,username,password,role) VALUES("Korsiye Bochora","korsiye","1234","employe");

CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  discription TEXT,
  assigned_to INT,
  due_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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


