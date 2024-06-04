<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eBug home</title>
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
      
        <li><a href="AddBugs.php">Add Bugs</a></li>
        <li><a href="CustomerDashboard.php">Customer Dashboard</a></li>
        <li><a href="MessageCustomer.php">Messages</a></li>
        <li><a href="ContactUs.php" >Contact Us</a></li>
        <li><a href="FeedBack.php">Feedback</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="Login.php">Logout</a></li>

      </ul>
    </nav>
  </header>
    <div class="container">
  <div class="description-container">
  <h2 class="mb-4">Welcome to eBug Tracker</h2>
                <p class="lead">
                    eBug Tracker is a powerful and user-friendly bug tracking system that helps you manage and resolve software bugs efficiently.
                </p>
                <p class="mb-5">
                    With eBug Tracker, you can easily submit bugs, track their progress, and collaborate with your team to ensure a smooth development process.
                </p>
</div>

    <main class="container">
        <div class="row">
          
               
                <h3 class="mb-4">Submit a Bug</h3>
                <form id="bug-form" method="post">
                   
                        <label for="bug-name" class="form-label">Bug Name</label>
                        <input type="text" class="form-control" id="bug-name" placeholder="Enter bug name">
                    
                    
                        <label for="bug-category" class="form-label">Bug Category</label>
                        <select class="form-select" id="bug-category">
                            <option value="backend">Backend</option>
                            <option value="frontend">Frontend</option>
                            <option value="problem-solving">Problem Solving</option>
                            <!-- Add more categories as needed -->
                        </select>
                        <label for="project-name" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="project-name">
                    
                    
                        <label for="bug-screenshot" class="form-label">Screenshot</label>
                        <input type="file" class="form-control" id="bug-screenshot">
                  
                        <label for="bug-details" class="form-label">Bug Details</label>
                        <textarea class="form-control" id="bug-details" rows="5" placeholder="Enter bug details"></textarea>
                  
                    <button type="submit" class="btn btn-primary">Submit Bug</button>
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
                    <ahref="tel:+1234567890">+1 234-567-890</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>