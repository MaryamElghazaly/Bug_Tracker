<?php
class DB_Connect {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "bugtrackingsystem";
    public $conn;

    // Establish database connection
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
