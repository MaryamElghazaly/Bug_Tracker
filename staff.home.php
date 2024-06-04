
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>staff home</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    
</head>
<body>
    
</body>
</html>
<header>
  <div class="logo">
    <a href="staff.home.php">eBug Tracker</a>
  </div>
  <nav>
    <ul>
      <li><a href="StaffMessages.php">Messages</a></li>
      <li><a href="staffDashboard.php">Dashboard</a></li>
      <li><a href="Login.php">Logout</a></li>

    </ul>
  </nav>
</header>


<div class="container">
  <div class="search-bar">
    <input type="text" placeholder="Search by bug ID">
    <button type="submit">Search</button>
    <button class="filter-button">Filter by category</button>
  </div>
 

<div class="container">
  
<pr>
<br>
  <h2>Assigned bugs</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Description</th>
        <th>Status</th>
        <th>Assigned to</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- add rows for each assigned bug here -->
      <tr>
  <td>123</td>
  <td>Software</td>
  <td>Button not working</td>
  <td>Assigned</td>
  <td>John Doe</td>
  <td>
  <button type="submit">  <a href= "BugDetails.php"> view details</a> </button>
  </td>
</tr>
<!-- add rows for each assigned bug here -->
    </tbody>
  </table>
</pr>
</br>


  

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