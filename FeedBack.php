<!-- feedback.html -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

  <title>Feedback</title>

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
        <li><a href="MessageCustomer.php">Messages</a></li>
        <li><a href="ContactUs.php" >Contact Us</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
        <li><a href="Login.php">Logout</a></li>
 
      </ul>
    </nav>
  </header>
  
  <section class="content">
    <div class="container">
      <h1>Feedback</h1>
     <p>We value your feedback. Please let us know how we can improve.</p> 
      <form id="feedback-form" method="post">
        <input type="text" placeholder="Name">
        <input type="email" placeholder="Email">
        <textarea placeholder="Feedback"></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
  </body>
    </div>
  </section>

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