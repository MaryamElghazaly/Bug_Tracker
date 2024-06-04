<?php
require_once 'db_connect.php';
require_once 'AdminUsers.php';

// Instantiate the AdminUsers class
$adminusers = new AdminUsers();

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
    $userID = $_POST['userID'];
    if ($adminusers->deleteUser($userID)) {
        echo "User deleted successfully.";
    } else {
        echo "Error: User deletion failed.";
    }
}

if (isset($_POST['update'])) {
  $userID = $_POST['userID'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $role = $_POST['role'];

  if ($adminusers->updateUser($userID, $name, $email, $role)) {
      echo "User information updated successfully.";
  } else {
      echo "Error: User information update failed.";
  }
}

if (isset($_POST['add'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  if ($adminusers->addUser($name, $email, $password, $role, $department)) {
      echo "User added successfully.";
  } else {
      echo "Error: User addition failed.";
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

  <title>Manage Users</title>
</head>

<body>
  <header>
    <div class="logo">
      <a>eBug Tracker</a>
    </div>
    <nav>
      <ul>
        <li><a href="AdminDashboard.php">Dashboard</a></li>
        <li><a href="Messages.php">Messages</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </nav>
  </header>

<div class="container">



      <h2 class="Manage-Users">Manage Users</h2>

    <div class="container">
       <input type="text" class="search-input" placeholder="Search Users With ID">
       <button type="submit">Search</button>   
      
       <h2>All Staff</h2>
      <table class="table">
      <thead>
              <tr>
               <th>User ID</th>
               <th>User Name</th>
               <th>User Department</th>
               <th>Action</th>
              </tr>
            </thead>
        <tbody>
          <?php foreach ($adminusers->getAllStaff() as $staff): ?>
            <tr>
              <td><?php echo $staff['UserID']; ?></td>
              <td><?php echo $staff['FullName']; ?></td>
              <td><?php echo $staff['Department']; ?></td>
              <td>
                <!-- Delete button -->
                <form method="post">
                  <input type="hidden" name="userID" value="<?php echo $staff['UserID']; ?>">
                  <button type="submit" name="delete" class="btn btn-primary">Delete</button>
                </form>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
              </td>
              
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- All Customers table -->
      <h2>All Customers</h2>
      <table class="table">
        <!-- Table header -->
        <thead>
              <tr>
               <th>User ID</th>
               <th>User Name</th>
               <th>Action</th>
              </tr>
        <tbody>
          <?php foreach ($adminusers->getAllCustomers() as $customer): ?>
            <tr>
              <td><?php echo $customer['UserID']; ?></td>
              <td><?php echo $customer['FullName']; ?></td>
              <td>
                <!-- Delete button -->
                <form method="post">
                  <input type="hidden" name="userID" value="<?php echo $customer['UserID']; ?>">
                  <button type="submit" name="delete" class="btn btn-primary smallButton">Delete</button>
                </form>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>


     </br>

      <h2>Add New Users</h2>

    <form id="add-users-form" method="post">
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" required placeholder="Enter User Full Name">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required placeholder="Enter User Email">

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required placeholder="Enter User Password">

      <label for="role">Role:</label>
      <select id="role" name="role" required>
        <option value="">Select</option>
        <option value="staff">Staff</option>
        <option value="customer">Customer</option>
      </select>
      <label for="department">Department:</label>
      <input type="text" id="department" name="department" required placeholder="Enter User Department">
      </br><button type="submit" class="smallButton" name="add">Add</button>
    </form> </br> </br> 
   
   

   </div>
 </div>



<!-- Edit Modal -->
<main><!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="userID" id="editUserID">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select id="role" name="role" class="form-control">
                            <option value="staff">Staff</option>
                            <option value="customer">Customer</option>
                        </select>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
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
                    <ahref="tel:+1234567890">+1 234-567-890</a>
                </div>
            </div>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>