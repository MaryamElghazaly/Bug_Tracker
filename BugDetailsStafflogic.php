<?php
require_once 'db_connect.php';

class BugDetailsStaff {
    private $conn;

    public function __construct() {
        $db = new DB_Connect();
        $this->conn = $db->conn;
    }

    // Fetch bug details from the database based on bug ID
    public function getBugDetails($bugID) {
        $sql = "SELECT * FROM bugs WHERE BugID = '$bugID'";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Fetch bug flow (creation date) from the database based on bug ID
    public function getBugFlow($bugID) {
        $sql = "SELECT CreatedAT FROM bugs WHERE BugID = '$bugID'";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }


    // Assign a bug to a staff member
    public function assignBugToStaff($bugID, $staffID) {
        $sql = "INSERT INTO assigned_bugs (BugID, StaffID) VALUES ('$bugID', '$staffID')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    public function getStaffInvolvement($staffID) {
        $sql = "SELECT * FROM users WHERE UserID = '$staffID'";
        $result = $this->conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Insert bug solution into the database
    public function insertBugSolution($bugID, $solution, $submittedBy) {
        $bugID = $this->conn->real_escape_string($bugID);
        $solution = $this->conn->real_escape_string($solution);
        $submittedBy = $this->conn->real_escape_string($submittedBy);

        $sql = "INSERT INTO bugsolutions (BugID, Solution, SubmittedBy) VALUES ('$bugID', '$solution', '$submittedBy')";

        return $this->conn->query($sql);
    }
}