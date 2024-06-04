<?php
require_once 'db_connect.php';

class User {
    private $conn;

    public function __construct() {
        $db = new DB_Connect();
        $this->conn = $db->conn;
    }

    // Register a new user
    public function registerUser($name, $email, $password) {
        // Escape special characters to prevent SQL injection
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);

        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // SQL query to insert user data into the database
        $sql = "INSERT INTO users (FullName, Email, Password, Role) VALUES ('$name', '$email', '$hashed_password', 'customer')";

        if ($this->conn->query($sql) === TRUE) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }
}

