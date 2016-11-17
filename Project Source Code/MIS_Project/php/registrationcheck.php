<?php

//*****ZAFAR*****
if(!isset($_POST['submit'])){
  header('Location: ../register.php');
}

include('config.php');
include('mail.php');

$username=strip_tags($_POST['username']);
$useremail=strip_tags($_POST['useremail']);
$userpassword=strip_tags($_POST['userpass']);
$password_confirm=strip_tags($_POST['confpass']);

$username=stripslashes($username);
$useremail=stripslashes($useremail);
$userpassword=stripslashes($userpassword);
$password_confirm=stripslashes($password_confirm);
//*****ZAFAR*****


//*****ROD*****
if(!$username || !$userpassword || !$useremail)
{
	echo "Please, fill up all the fields correctly!";
}
else
{
	//encrypt password
	$userpassword = md5($userpassword);
	$password_confirm = md5($password_confirm);

	//check if username already taken
	$usnm = "SELECT * FROM user WHERE username='$username'";
	$checkusnm = mysqli_query($conn,$usnm);
	$mail = "SELECT * FROM user WHERE email='$useremail'";
	$checkmail = mysqli_query($conn,$mail);

	if($checkusnm->num_rows==1)
	{
		echo "Username already taken";
		return;
	}
	if ($checkmail->num_rows==1) {
		echo "This email already used";
		return;
	}
	if($password_confirm!=$userpassword)
	{
  		echo "Passwords does not match";
  		return;
	}
	else
	{
		//generate random code
		$code = rand(11111111,99999999);

		//send activation email
		$email->addAddress($useremail, $username);

		$email->Subject = "Activate your account";
		$email->Body = "Hello $username, \n\nYou have registered to Seat Planning System. Now, activate your account by clicking the link below-\n\nhttp://localhost/MIS_Project/php/activate.php?code=$code\n\nThank you!";
		$email->AltBody = "Hello Sajidul, this is a test mail, do not reply.";

		if(!$email->send())
		{
			echo "Sorry, we couldn't sign you up at this moment. Please, try again later.";
		}
		else
		{
			//register to database
			$sql = "INSERT INTO user (username,password,email,code,active) VALUES ('$username','$userpassword','$useremail','$code','0')";
			mysqli_query($conn,$sql);
			echo "You have been registered successfully! Please, check your email ($useremail) to activate your account.";
		}
	}
}
//*****ROD*****

//*****ZAFAR*****

/*
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
*/
//*****ZAFAR*****


 ?>