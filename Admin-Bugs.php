<?php
require_once 'db_connect.php';
require_once 'AdminBugs.php';

// Instantiate the AdminBugs class
$adminbugs = new AdminBugs();

// Delete bug if delete button is clicked
if (isset($_POST['delete'])) {
    $BugID = $_POST['BugID'];
    if ($adminbugs->deleteBug($BugID)) {
        echo "Bug deleted successfully.";
    } else {
        echo "Error: Bug deletion failed.";
    }
}

// Update bug information if update button is clicked
if (isset($_POST['update'])) {
    $BugID = $_POST['BugID'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    if ($adminbugs->updateBug($BugID, $category, $status)) {
        echo "Bug information updated successfully.";
    } else {
        echo "Error: Bug information update failed.";
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

    <title>Manage Bugs</title>
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
        <h2 class="Manage-Bugs">Manage Bugs</h2>

        <div class="container">
            <input type="text" class="search-input" placeholder="Search Bugs With Bug ID">
            <button type="submit">Search</button> </br> </br>


            <h3 class="title">All Bugs</h3> </br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Bug ID</th>
                        <th>Bug Category</th>
                        <th>Project Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($adminbugs->getAllBugs() as $bug) : ?>
                        <tr>
                            <td><?php echo $bug['BugID']; ?></td>
                            <td><?php echo $bug['Category']; ?></td>
                            <td><?php echo $bug['Description']; ?></td>
                            <td><?php echo $bug['Status']; ?></td>
                            <td>
                                <!-- Delete button -->
                                <form method="post">
                                    <input type="hidden" name="BugID" value="<?php echo $bug['BugID']; ?>">
                                    <button type="submit" name="delete" class="btn btn-primary">Delete</button>
                                </form>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                <a href="BugDetails.php?BugID=<?php echo $bug['BugID']; ?>"><button class="btn btn-primary"> View Details</button></a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Edit Modal -->
    <main>
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Bug Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="BugID" id="editBugID">
                        <form>
                            <div class="form-group">
                                <label for="bug-category">Bug Category:</label>
                                <input type="text" id="bug-category" class="form-control" value="Backend" name="category">
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select id="status" name="status" required>
                                    <option value="">Select</option>
                                    <option value="New">New</option>
                                    <option value="Assigned">Assigned</option>
                                    <option value="Resolved">Resolved</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
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
