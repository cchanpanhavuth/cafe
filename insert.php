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
      <li ><a href="products.php">Menu</a></li>
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
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO id, name, image, price, category FROM tbl_product";
if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $tmp = (explode('.',$_FILES['image']['name']));
    $file_ext = end($tmp);
    
    $extensions= array("jpeg","jpg","png");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
     
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"images/".$file_name);
       echo "Success, ";
    }else{
       print_r($errors);
    }
 }

if(isset($_POST['submit']))
{    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $sql = "INSERT INTO tbl_product (name, image, price, category) VALUES ('$name', '$file_name', '$price','$category')";
    if (mysqli_query($conn, $sql)) {
       echo "Entry has been created.";
    } else {
       echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>
<div class="container">
<p>Please fill this form and submit to create an entry to the database.</p>
    <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price in USD">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category">
                <option value="Food">Food</option>
                <option value="Drink">Drink</option>
            </select>
        </div>
            <input type="submit" class="btn btn-success" name="submit" value="Create">
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