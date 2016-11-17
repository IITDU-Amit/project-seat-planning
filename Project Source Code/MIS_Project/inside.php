<?php session_start();

if(!isset($_SESSION['useremail'])){
  header('Location: ../signin.php');
}

echo $_SESSION['username'];
echo $_SESSION['useremail'];
$user=$_SESSION['user'];
echo $user['useremail'];
echo $user['username'];

echo "welcome authenticated user";

?>
