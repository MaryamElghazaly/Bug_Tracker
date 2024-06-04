<?php
include "db_connect.php";
include "User.php";
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();

    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Authenticate the user
    $userData = $user->authenticateUser($email, $password);

    if ($userData) {
        // Authentication successful
        // Redirect user based on role
        switch ($userData['Role']) {
            case 'admin':
                header("Location: AdminDashboard.php?userID=" . $userData['UserID']);
                break;
            case 'staff':
                header("Location: StaffDashboard.php?userID=" . $userData['UserID']);
                break;
            case 'customer':
                header("Location: CustomerDashboard.php?userID=" . $userData['UserID']);
                break;
            default:
                // Handle other roles or redirect to a default page
                break;
        }
        exit();
    } else {
        // Authentication failed
        echo "Invalid email or password.";
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

  <title>Login</title>
  
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
    <h2>Login</h2>
    <form id="login-form" method="post">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required placeholder="Enter Your Email">
      
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required placeholder="Enter Your Password">
      
      <button type="submit">Submit</button>
    </form>
    <p>Do not have an account? <a href="Register.php">Sign Up</a></p>
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