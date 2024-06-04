<?php
require_once 'db_connect.php';

class AdminBugs {
    private $conn;

    public function __construct() {
        $db = new DB_Connect();
        $this->conn = $db->conn;
    }

    // Fetch all projects from the database
    public function getAllBugs() {
        $sql = "SELECT * FROM bugs";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteBug($BugID) {
        $sql = "DELETE FROM bugs WHERE BugID = $BugID";
        return $this->conn->query($sql);
    }

    public function updateBug($BugID, $category, $status) {
        $BugID = $this->conn->real_escape_string($BugID);
        $category = $this->conn->real_escape_string($category);
        $status = $this->conn->real_escape_string($status);

        $sql = "UPDATE bugs SET Category = '$category', Status = '$status' WHERE BugID = $BugID";

        return $this->conn->query($sql);
    }

}
    