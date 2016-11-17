<?php

if(!isset($_POST['submit'])){
  header('Location: ../register.php');
}

include('config.php');

$username=strip_tags($_POST['username']);
$useremail=strip_tags($_POST['useremail']);
$userpassword=strip_tags($_POST['userpass']);
$password_confirm=strip_tags($_POST['confpass']);

$username=stripslashes($username);
$useremail=stripslashes($useremail);
$userpassword=stripslashes($userpassword);
$password_confirm=stripslashes($password_confirm);


$sql_insert="INSERT into user (username,password,email) values ('$username','$userpassword','$useremail')";

$dbUserExistQuery = ("SELECT * FROM user WHERE email='$useremail'");
$result =$conn->query($dbUserExistQuery);

if($result->num_rows==1){
  echo "The email is already in use. Please Enter a different email address";
  return;
}
if($username == ""){
  echo "Please enter a username";
  return;
}
if($password_confirm!=$userpassword){
  echo "Passwords does not match";
  return;
}

$result = $conn->query($sql_insert);
echo "successful";

 ?>
