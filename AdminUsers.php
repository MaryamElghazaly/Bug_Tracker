<?php
require_once 'db_connect.php';

class AdminUsers {
    private $conn;

    public function __construct() {
        $db = new DB_Connect();
        $this->conn = $db->conn;
    }

    // Fetch all staff members from the database
    public function getAllStaff() {
        $sql = "SELECT UserID, FullName, Department FROM users WHERE Role = 'staff'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fetch all customers from the database
    public function getAllCustomers() {
        $sql = "SELECT UserID, FullName FROM users WHERE Role = 'customer'";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Delete a user by ID
    public function deleteUser($userID) {
        $sql = "DELETE FROM users WHERE UserID = $userID";
        return $this->conn->query($sql);
    }

    // Update user information
    public function updateUser($userID, $name, $email, $role) {
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $role = $this->conn->real_escape_string($role);

        $sql = "UPDATE users SET FullName = '$name', Email = '$email', Role = '$role' WHERE UserID = $userID";

        return $this->conn->query($sql);
    }

    // Add a new user
    public function addUser($name, $email, $password, $role, $department) {
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);
        $role = $this->conn->real_escape_string($role);
        $department = $this->conn->real_escape_string($department);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (FullName, Email, Password, Role, Department) VALUES ('$name', '$email', '$hashed_password', '$role', '$department')";

        return $this->conn->query($sql);
    }
}