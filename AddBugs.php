<?php
require_once 'db_connect.php';
require_once 'Customer.php';

if(isset($_POST['submit_bug'])) {

    $customer = new Customer();
    // Form submitted, process the data
    $bugCategory = $_POST['bug_category'];
    $projectName = $_POST['project_name'];
    $bugDetails = $_POST['bug_details'];

    if ($customer->addBug($bugCategory, $projectName, $bugDetails)) {
      header("Location: AddBugs.php");
  } else {
      echo "Error: Bug adding failed.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Add Bugs</title> 
</head> 
<body>
    <header>
        <div class="logo">
            <a href="home.php">eBug Tracker</a>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="CustomerDashboard.php">Customer Dashboard</a></li>
                <li><a href="MessageCustomer.php">Messages</a></li>
                <li><a href="ContactUs.php" >Contact Us</a></li>
                <li><a href="FeedBack.php">Feedback</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="Login.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <h3 class="mb-4">Add Your Bug Here</h3>
        <div class="row">
            <div class="col-md-6">
                <form id="bug-form" method="post">
                    <div class="mb-3">
                        <label for="bug-category" class="form-label">Bug Category</label>
                        <select class="form-select" id="bug-category" name="bug_category">
                            <option value="backend">Backend</option>
                            <option value="frontend">Frontend</option>
                            <option value="problem-solving">Problem Solving</option>
                            <!-- Add more categories as needed -->
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="project-name" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="project-name" name="project_name">
                    </div>
                    <div class="mb-3">
                        <label for="bug-details" class="form-label">Bug Details</label>
                        <textarea class="form-control" id="bug-details" name="bug_details" rows="5" placeholder="Enter bug details"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit_bug">Submit Bug</button>
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
