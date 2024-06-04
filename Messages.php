<?php
require_once 'db_connect.php';
require_once 'Message.php';

// Ensure $userID is defined and contains the correct user ID
// Replace this with your logic for retrieving the user ID after login
$userID = 1; // Example user ID

$messageObj = new Message();

// Check if the compose message form is submitted
if (isset($_POST['send'])) {
    $recipientID = $_POST['recipient'];
    $subject = $_POST['subject'];
    $content = $_POST['message'];

    // Send the message
    if ($messageObj->sendMessage($userID, $recipientID, $subject, $content)) {
        // Message sent successfully
        echo "Message sent successfully.";
    } else {
        // Error sending message
        echo "Error: Failed to send message.";
    }
}

// Fetch messages for the current user
$messages = $messageObj->getMessages($userID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<header>
    <div class="logo">
        <a href="">eBug Tracker</a>
    </div>
    <nav>
        <ul>
            <li><a href="AdminDashboard.php">Dashboard</a></li>
            <li><a href="Messages.php">Messages</a></li>
            <li><a href="Login.php">Logout</a></li>
        </ul>
    </nav>
</header>

<main class="container">
    <h1>Messages</h1>
    <div class="row">
        <div class="col-md-3">
            <h2>Inbox</h2>
            <ul class="list-group">
                <?php foreach ($messages as $message): ?>
                <li class="list-group-item">
                    <a href="#"><?php echo $message['Subject']; ?></a>
                    <?php if (!$message['IsRead']): ?>
                    <span class="badge badge-primary">New</span>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-9">
            <h2>Compose Message</h2>
            <form method="post" id="compose-message-form">
                <label for="recipient">To:</label>
                <select id="recipient" class="form-control" name="recipient" required>
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                </select>

                <label for="subject">Subject:</label>
                <input type="text" id="subject" class="form-control" name="subject">

                <label for="message">Message:</label>
                <textarea id="message" class="form-control" name="message" rows="5"></textarea>

                <button type="submit" name="send" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</main>

<footer class="footer"> 
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2023 eBug Tracker. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-end">
                <a href="mailto:support@ebugtracker.com" class="me-2">support@ebugtracker.com</a>
                <a href="tel:+1234567890">+1 234-567-890</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
