<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "up_shop";
$message = "";

$params =  explode('?' , $_SERVER['REQUEST_URI']);
// print_r($params );
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
$sql = "DELETE FROM tbl_product WHERE id=$params[1]";
mysqli_query($conn, $sql);
$conn->close();
?>
<script>
    location.replace('dashboard.php');
</script>