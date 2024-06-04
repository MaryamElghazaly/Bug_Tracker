<?php
require_once 'db_connect.php';
require_once 'Customer.php';

// Check if user is logged in
if (isset($_GET['userID'])) {
    $customeruser = new Customer();
    $customerID = $_GET['userID'];

      // Check if the update profile form is submitted
      if (isset($_POST['updateProfile'])) {
      // Get the updated profile data from the form
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      // Update the admin profile
      if ($customeruser->updateCustomerProfile($customerID, $name, $email, $password)) {
          // Profile updated successfully
          echo "Profile updated successfully.";
          // Refresh the page to reflect the changes
          header("Location: CustomerDashboard.php?userID=$customerID");
          exit();
      } else {
          // Error updating profile
          echo "Error: Profile update failed.";
      }
    }


    // Display admin profile information
    $acustomerProfile = $customeruser->getCustomerProfile($customerID);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">


    <title>Customer Dashboard</title>
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
                <li><a href="MessageCustomer.php">Messages</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="FeedBack.php">Feedback</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="Login.php">Logout</a></li>

            </ul>
        </nav>
    </header>

    <main class="container">
        <h1>Customer Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Personal Information</h2>
                <table class="table table-striped">
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $acustomerProfile['FullName']; ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $acustomerProfile['Email']; ?></td>
                    </tr>
                </table>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
            </div>
            <div class="col-md-6">
                <h2>Actions</h2>
                <button class="btn btn-danger" onclick="logout()">Logout</button>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Personal Information</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="<?php echo $acustomerProfile['FullName']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="<?php echo $acustomerProfile['Email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <button type="submit" name="updateProfile" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
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
