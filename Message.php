<?php
require_once 'db_connect.php';

class Message {
    private $conn;

    public function __construct() {
        $db = new DB_Connect();
        $this->conn = $db->conn;
    }

    // Fetch messages for the current user
    public function getMessages($userID) {
        $userID = $this->conn->real_escape_string($userID);

        $sql = "SELECT * FROM messages WHERE RecipientID = '$userID' ORDER BY SentAt DESC";
        $result = $this->conn->query($sql);

        $messages = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $messages[] = $row;
            }
        }
        return $messages;
    }

    // Send a message
    public function sendMessage($senderID,$subject, $content) {
        $senderID = $this->conn->real_escape_string($senderID);
        $subject = $this->conn->real_escape_string($subject);
        $content = $this->conn->real_escape_string($content);

        $sql = "INSERT INTO messages (SenderID, RecipientID, Subject, Content) 
                VALUES ('$senderID','$subject', '$content')";

        return $this->conn->query($sql);
    }
}


