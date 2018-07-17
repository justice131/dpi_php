<?php
$someVar = "hhhhjjjjj22";
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '123';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
die('Could not connect: ' . mysql_error());
}
mysqli_select_db($conn, "dpi_project"); 

$sql = "SELECT * FROM whole_catchment_indices WHERE catchment_name='CAT_MacquarieBogan'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
#$_SESSION['overall_fui'] =$row["overall_fui"];

#header("Location: http://localhost/DPI_V/index.php"); 

