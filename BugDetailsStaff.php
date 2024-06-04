<?php
require_once 'db_connect.php';
require_once 'BugDetailsStafflogic.php';


$bugDetailsData = new BugDetailsStaff();

// Check if bug ID is provided
if (isset($_GET['BugID'])) {
    $bugID = $_GET['BugID'];
    
    // Fetch bug details
    $bugDetails = $bugDetailsData->getBugDetails($bugID);
    
    // Fetch bug flow
    $bugFlowData = $bugDetailsData->getBugFlow($bugID);

    // Fetch staff involvement data
    $staffInvolvementData = $bugDetailsData->getStaffInvolvement($bugDetails['AssignedTo']);
    
}

// Check if assign form is submitted
if (isset($_POST['assign'])) {
  $bugID = $_POST['bug_id'];
  $staffID = $_POST['staff_id'];
  
  // Assign bug to staff
  $assigned = $bugDetailsData->assignBugToStaff($bugID, $staffID);
  if ($assigned) {
      // Bug assigned successfully
      header("Location: BugDetails.php?BugID=$bugID");
      exit;
  } else {
      // Failed to assign bug
      $assignError = "Failed to assign bug. Please try again.";
  }
}

// Check if the solution form is submitted
if (isset($_POST['save_solution'])) {
  $bugID = $_GET['BugID']; // Assuming BugID is passed via URL
  $solution = $_POST['bug_solution']; // Assuming the textarea name is 'bug_solution'
  $submittedBy = 1; // Assuming the user is logged in and their ID is 1

  // Insert the bug solution into the database
  if ($bugSolution->insertBugSolution($bugID, $solution, $submittedBy)) {
      // Solution saved successfully
      echo "Solution saved successfully.";
  } else {
      // Error saving solution
      echo "Error: Failed to save solution.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Details</title>
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
      <li><a href="messages.php">Messages</a></li>
      <li><a href="StaffDashboard.php">Dashboard</a></li>
      <li><a href="Login.php">Logout</a></li>

    </ul>
  </nav>
 

</header>
<div class="container">

<h2>Bug Details</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Project</th>
                <th>Description</th>
                <th>Status</th>
                <th>Assigned to</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $bugDetails['BugID']; ?></td>
                <td><?php echo $bugDetails['Category']; ?></td>
                <td><?php echo $bugDetails['Project']; ?></td>
                <td><?php echo $bugDetails['Description']; ?></td>
                <td><?php echo $bugDetails['Status']; ?></td>
                <td><?php echo $bugDetails['AssignedTo']; ?></td>
                <td><?php echo $bugFlowData['CreatedAt']; ?></td>
            </tr>
        </tbody>
    </table>

  <h2>Write Solution</h2>
  <form action="/bug/123/solution" method="post">
  <div class="mb-3">
    <textarea class="form-control" id="bug-solutoin" rows="5" placeholder="Enter solution"></textarea>
    </div>
    <button type="submit" name="save_solution">Save Solution</button>
  </form>
</div>


<main class="container">
<div class="bug-case-flow">
        <h2>Bug Case Flow</h2>
        <ul>
            <li>
                <strong>Created:</strong> <?php echo $bugFlowData['CreatedAt']; ?> by <?php echo $staffInvolvementData['FullName']; ?>
            </li>
        </ul>
    </div>
</main>

<main class="container">
    <h1>Assign to another staff</h1>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Bug ID</th>
                <th>Category</th>
                <th>Assign to Staff Member</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?php echo $bugDetails['BugID']; ?></td>
                <td><?php echo $bugDetails['Category']; ?></td>
                <td>
                    <form>
                        <input type="hidden" name="bug_id" value="123">
                        <input type="hidden" name="category" value="Software">
                        <div class="form-group">
                        <label for="staff_id">Staff ID:</label>
                        <input type="text" id="staff_id" name="staff_id" class="form-control" required>
                    </div>
                    <button type="submit" name="assign" class="btn btn-primary">Assign</button>
                    <?php if(isset($assignError)) { ?>
                        <div class="alert alert-danger" role="alert"><?php echo $assignError; ?></div>
                    <?php } ?>
                </td>
            </tr>
        </tbody>
    </table>
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