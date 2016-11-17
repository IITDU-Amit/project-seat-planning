<?php
session_start();

if(!isset($_POST['submit'])){
  header('Location: ../signin.php');
}

include('config.php');

$useremail=strip_tags($_POST['useremail']);
$userpassword=strip_tags($_POST['userpass']);

echo $useremail;
echo $userpassword;
$dbquery = ("SELECT * FROM user WHERE email='$useremail'");
$result =$conn->query($dbquery);


if($result->num_rows<1){
  header('Location: ../signin.php');
}
else{
  echo "inside";
  $row = $result->fetch_assoc();
  echo $row['username'];
  echo $row['']
  if($userpassword==$row['password']){

    $_SESSION['useremail'] = $useremail; //assign session
    $_SESSION['username'] = $row['username']; //assign session
    $_SESSION['id']=$row['Id'];
  //  echo $_session['useremail'];
   header('Location: ../profile.php');
  }


}
//mysql_close($conn);

//else echo "ok";

 ?>
