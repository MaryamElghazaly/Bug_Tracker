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
      <a href="home.php">eBug Tracker</a>
    </div>
    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="AddBugs.php">Add Bugs</a></li>
        <li><a href="CustomerDashboard.php">Customer Dashboard</a></li>
        <li><a href="ContactUs.php" >Contact Us</a></li>
        <li><a href="FeedBack.php">Feedback</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
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
                <li class="list-group-item">
                    <a href="#">Message from Admin</a>
                    <span class="badge badge-primary">New</span>
                </li>
                <li class="list-group-item">
                    <a href="#">Message from Staff</a>
                </li>
                <!-- Add more messages here -->
            </ul>
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
                    <ahref="tel:+1234567890">+1 234-567-890</a>
                </div>
            </div>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>