
<?php
include "db_connect.php";
include "User.php";
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = new User();

  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Register the user
  if ($user->registerUser($name, $email, $password)) {
      echo "User registered successfully.";
      header("Location: login.php");
  } else {
      echo "Error: User registration failed.";
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

  <title>Registration Form</title>
  </head>

<body>
<header>
  <div class="logo">
    <a href="index.php">eBug Tracker</a>
  </div>
  <nav>
    <ul>
    <li><a href="index.php">Home</a></li>
      <li><a href="Login.php">Login</a></li>
      <li><a href="Register.php">Register</a></li>
    </ul>
  </nav>
</header>

<div class="container">
  <h2>Registration Form</h2>
  <form id="registration-form" method="post" action="register.php">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required placeholder="Enter Your Full Name">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required placeholder="Enter Your Email">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required placeholder="Enter Your Password">

    <button type="submit">Submit</button>
  </form>
  <p>Already have an account? <a href="login.php" target="_blank">Log in</a></p>
</div>

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