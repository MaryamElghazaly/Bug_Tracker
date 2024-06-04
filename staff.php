<?php
require_once 'db_connect.php';

class Staff {
    private $conn;

    public function __construct() {
        $db = new DB_Connect();
        $this->conn = $db->conn;
    }

    // Get staff profile information
    public function getStaffProfile($staffID) {
        $staffID = $this->conn->real_escape_string($staffID);

        $sql = "SELECT * FROM users WHERE userID='$staffID'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return false;
    }

    // Update staff profile
    public function updateStaffProfile($staffID, $name, $email, $password) {
        $staffID = $this->conn->real_escape_string($staffID);
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE staff SET FullName='$name', Email='$email', Password='$hashed_password' WHERE StaffID='$staffID'";

        return $this->conn->query($sql);
    }
}

// Check if user is logged in
if (isset($_GET['userID'])) {
    $staffuser = new Staff();
    $staffID = $_GET['userID'];

    // Display staff profile information
    $staffProfile = $staffuser->getStaffProfile($staffID);
}
