<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include('database_connection.php');
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Coffee Shop</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
 
<body>
    <header>
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Coffee Shop</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="products.php">Menu</a></li>
      <li><a href="index.php#aboutus">About Us</a></li>
      <li><a href="index.php#contact">Contact</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li class="active"><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>    </ul>

  </div>
</nav>
</header>
<div class="container">
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        <a href="register.php" class="btn btn-primary">Create New Admin Account</a>
        <a href="insert.php" class="btn btn-success">New Database Entry</a>
    </p>
    <div class="table-repsonsive">
    <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Category</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <?php
 
 //fetch_item.php
  
 include('database_connection.php');
  
 $query = "
 SELECT * FROM tbl_product ORDER BY id ASC
 ";
  
 $statement = $connect->prepare($query);
  
 if ($statement->execute()) {
     $result = $statement->fetchAll();
     $output = '';
     foreach ($result as $row) {
         $output .= '
    <tbody>
      <tr>
        <td>'.$row["id"].'</td>
        <td>'.$row["name"].'</td>
        <td><img src="images/' . $row["image"] . '" class="img-responsive" width="20%" height="20%" /></td>
        <td>'.$row["price"].'</td>
        <td>'.$row["category"].'</td>
        <td>
            <a href="update.php?'. $row["id"] .'" role="button" class="btn btn-primary">Update</a>
        </td>    
        <td>
            <a href= "#nogo" onclick="deleteT(' . $row["id"] . ')" role="button" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    </tbody>
  
   ';
     }
     echo $output;
 }?>
 </table>
 </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script>
  function deleteT(id){
    if (confirm(`Are you sure you want to delete data ID : ${id} ?`)){
      location.replace('delete.php?' + id.toString())
    }
    
  }
</script>
</html>