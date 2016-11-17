<?php session_start();

if(!isset($_SESSION['useremail'])){
  header('Location: ./signin.php');
}


include('config.php');

$username=strip_tags($_POST['username']);
$useremail=strip_tags($_POST['useremail']);
$userpassword=strip_tags($_POST['userpass']);
$userID=$_SESSION['id'];


$username=stripslashes($username);
$useremail=$_SESSION['useremail'];
$userpassword=stripslashes($userpassword);
$userpassword=md5($userpassword);


$sql_insert="UPDATE user SET username='$username',password='$userpassword',email='$useremail' WHERE Id='$userID'";


if($username == ""){
  echo "Please enter a username";
  return;
}

$result = $conn->query($sql_insert);

unset($_SESSION['useremail']);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
session_destroy();
session_start();

$_SESSION['useremail'] = $useremail; //assign session
$_SESSION['username'] = $username; //assign session
$_SESSION['id']=$userID;
header("Location: ../profile.php");



 ?>
