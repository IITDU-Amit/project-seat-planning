<?php


$dbhost = "localhost";
$dbusername="root";
$dbpassword="";
$dbname = "test";


$conn = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";



?>
