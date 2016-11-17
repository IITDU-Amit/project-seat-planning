<?php

include('config.php');

$code = $_GET['code'];

if(!$code)
{
	echo "No code supplied";
}
else
{
	$sql_update = "SELECT * FROM user WHERE code='$code' AND active='1'";
	$check = mysqli_query($conn,$sql_update);

	if($check->num_rows == 1)
	{
		echo "You have already activated your account";
	}
	else
	{
		$sql = "UPDATE user SET active='1' WHERE code='$code'";
		$activate = mysqli_query($conn,$sql);

		echo "Your account has been activated!";
		 header('Location: ../signin.php');
	}
}

 ?>
