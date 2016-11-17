<?php

//*****ROD*****

//ob
ob_start();

//session


//*****ROD*****

//*****ZAFAR*****
$dbhost = "localhost";
$dbusername="root";
$dbpassword="root";
$dbname = "test";


$conn = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//*****ZAFAR*****


?>
