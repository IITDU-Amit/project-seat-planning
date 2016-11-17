<?php

include('config.php');

$roomID=addslashes(strip_tags($_POST['room_id']));

$sql = "DELETE FROM roomplan WHERE room_id=$roomID";
mysqli_query($conn,$sql);

 header('Location: ../savedplans.php');



?>
