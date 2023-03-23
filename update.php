<!DOCTYPE html>
<html>
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
      <li class="active"><a href="login.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
      
    </ul>

  </div>
</nav>
</header>
    

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "up_shop";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$params =  explode('?' , $_SERVER['REQUEST_URI']);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id, name, image, price, category FROM tbl_product WHERE id=$params[1]";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
if(isset($_POST['submit']))
{    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $sql = "UPDATE tbl_product
    SET name='$name',image='$image',price='$price',category='$category'
    WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
       echo "Entry has been updated.";
    } else {
       echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header('Location: dashboard.php');
}

?>
<div class="container">
<p>Please fill this form and submit to update an entry to the database.</p>
    <form action="<?php $_PHP_SELF ?>" method="post">
            <div class="form-group">
            <label>ID</label>
            <input type="number" name="id" class="form-control" value="<?php echo $row['id'] ?>">
        </div>
            
        <div class="form-group">
            <label>name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>">
        </div>
        <div class="form-group">
            <label>image</label>
            <input type="text" name="image" class="form-control" value="<?php echo $row['image'] ?>">
        </div>
        <div class="form-group">
            <label>price</label>
            <input type="text" name="price" class="form-control" value="<?php echo $row['price'] ?>">
        </div>
        <div class="form-group">
            <label>category</label>
            <input type="text" name="category" class="form-control" value="<?php echo $row['category'] ?>">
        </div>
            <input type="submit" class="btn btn-success" name="submit" value="Update">
    </form><br>
    <a href="dashboard.php" class="btn btn-primary">Back to table</a>
    </div>

<footer>
    <div class="container">
    <hr>
        <div class="text-center center-block">
                <a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                <br>
                <p style="color:gray">@ 2022 Coffee shop</p>
            </div>

    <hr>
</div>
    </footer>
    </body>
</html>