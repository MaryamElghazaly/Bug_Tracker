<?php
require_once 'db_connect.php';

class Admin {
    private $conn;

    public function __construct() {
        $db = new DB_Connect();
        $this->conn = $db->conn;
    }

    // Get admin profile information
    public function getAdminProfile($userID) {
        $userID = $this->conn->real_escape_string($userID);

        $sql = "SELECT * FROM users WHERE UserID='$userID'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return false;
    }

    // Update admin profile
    public function updateAdminProfile($userID, $name, $email, $password) {
        $userID = $this->conn->real_escape_string($userID);
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET FullName='$name', Email='$email', Password='$hashed_password' WHERE UserID='$userID'";

        return $this->conn->query($sql);
    }
}
    


// Check if user is logged in
if (isset($_GET['userID'])) {
    $adminusers = new Admin();
    $adminID = $_GET['userID'];

    // Display admin profile information
    $adminProfile = $adminusers->getAdminProfile($adminID);
}
