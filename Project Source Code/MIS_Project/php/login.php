<?php
//*****ZAFAR*****
session_start();

include('config.php');

/*$session_usermail = $_SESSION['useremail'];*/

if(!isset($_POST['submit'])){
  header('Location: ../about.php');
}

$useremail=addslashes(strip_tags($_POST['useremail']));
$userpassword=addslashes(strip_tags($_POST['userpass']));
//*****ZAFAR*****

//*****ROD*****
if(!$useremail)
{
	echo "Email should be provided";
}
else if(!$userpassword)
{
	echo "Enter password correctly";
}
else
{
	//login

	$sql = "SELECT * FROM user WHERE email='$useremail'";

	$login = mysqli_query($conn,$sql);

	$row=mysqli_fetch_assoc($login);

	if($row == 0)
	{
		echo "No such user exists";
	}
	else
	{
		while ($row)
		{
			//get password from database
			$password_db = $row['password'];

			//encrypt form password
			$userpassword = md5($userpassword);

			if($userpassword!=$password_db)
			{
				echo "Incorrect password";
			}
			else
			{
				//check if available
				$active = $row['active'];
				$email = $row['email'];

				if ($active == 0)
				{
					echo "You haven't activated your account, please check your email ($useremail)";
				}
				else
				{
					$_SESSION['useremail'] = $useremail; //assign session
					$_SESSION['username'] = $row['username']; //assign session
					$_SESSION['id']=$row['Id'];

					header('Location: ../createseatplan.php'); //refresh
				}
			}
		}
	}
}
//*****ROD*****

//*****ZAFAR*****
/*$dbquery = ("SELECT * FROM user WHERE email='$useremail'");
$result =$conn->query($dbquery);


if($result->num_rows<1){
  header('Location: ../about.php');
}
else{
  $row = $result->fetch_assoc();
  if($userpassword==$row['password']){

    $_SESSION['useremail']=$row['email'];
  //  echo $_session['useremail'];
   header('Location: ../home.php');
  }


}*/


//else echo "ok";
//*****ZAFAR*****


 ?>
