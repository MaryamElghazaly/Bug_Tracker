<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

  <title>Manage Projects</title>
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

      <h2 class="Manage-Projects">Manage Projects</h2>

    <div class="container">
       <input type="text" class="search-input" placeholder="Search Projects With Project ID">
       <button type="submit">Search</button> </br> </br>
   
      
          <h2>All Projects</h2> </br>
           <table class="table">
            <thead>
              <tr>
               <th>Project ID</th>
               <th>Project Name</th>
               <th>Action</th>
              </tr>
            </thead>
        <tbody>

          <tr>
            <td>8</td>
            <td>Project B</td>
            <td> <a href=""><button class= "btn btn-primary"> Delete</button></a>  
         </tr>
        </tbody>
      </table>
   </div>

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