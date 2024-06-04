<?php
require_once 'db_connect.php';
require_once 'bugdetailslogic.php';


$bugDetailsData = new BugDetails();

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Bug Details</title>
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
        <li><a href="">Logout</a></li>
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

    <div class="bug-case-flow">
        <h2>Bug Case Flow</h2>
        <ul>
            <li>
                <strong>Created:</strong> <?php echo $bugFlowData['CreatedAt']; ?> by <?php echo $staffInvolvementData['FullName']; ?>
            </li>
        </ul>
    </div>

    <div class="container">
        <h2>Staff Involvement</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Role</th>
                    <th>User Department</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $staffInvolvementData['UserID']; ?></td>
                    <td><?php echo $staffInvolvementData['FullName']; ?></td>
                    <td><?php echo $staffInvolvementData['Role']; ?></td>
                    <td><?php echo $staffInvolvementData['Department']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <main class="container">
        <h2>Assign Bug to Staff</h2>
        <form method="post">
            <input type="hidden" name="bug_id" value="<?php echo $bugID; ?>">
            <div class="form-group">
                <label for="staff_id">Staff ID:</label>
                <input type="text" id="staff_id" name="staff_id" class="form-control" required>
            </div>
            <button type="submit" name="assign" class="btn btn-primary">Assign</button>
            <?php if(isset($assignError)) { ?>
                <div class="alert alert-danger" role="alert"><?php echo $assignError; ?></div>
            <?php } ?>
        </form>
    </main>
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
