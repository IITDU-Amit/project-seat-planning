<?php

include('config.php');

//echo $_POST['user_id'].$_POST['room_rows'];
/*if(!isset($_POST['user_id']) || !isset($_SESSION['useremail'])){
  header('Location: ../signin.php');
}*/
$userID=addslashes(strip_tags($_POST['user_id']));
$room_rows=addslashes(strip_tags($_POST['room_rows']));
$room_cols=addslashes(strip_tags($_POST['room_cols']));
$room_table=mysqli_real_escape_string($conn,$_POST['room_table']);
$room_teachers=$_POST['teachers'];



$room_no=addslashes(strip_tags($_POST['room_no']));
//echo "ok";
//echo "Thisis".$room_table.$_POST['room_table'];
$sql = "INSERT INTO roomplan (user_id,room_number,room_table,room_rows,room_cols) VALUES ('$userID','$room_no','$room_table','$room_rows','$room_cols')";
mysqli_query($conn,$sql);
$last_id = $conn->insert_id;


if($_POST['teachers']){
  $sql = "INSERT INTO teacher (teacher_name,teacher_email,room_plan_id) VALUES ";
foreach ($_POST['teachers'] as $key => $value) {

    $valuesArr[] = "('$value', '', '$last_id')";
}
 $sql .= implode(',', $valuesArr);
 mysqli_query($conn,$sql);
}
/*
if (count($_POST['students']) > 0)
{
    $sql = "INSERT INTO seat (room_plan_id,seat_row_pos,seat_col_pos,student_roll) VALUES ";
    foreach ($_POST['students'] as $row)
    {
        $seat_row=$row['roll'];
        $seat_col=$row['row'];
        $seat_student=$row['column'];
        $valuesArr[] = "('$last_id','$seat_row', '$seat_col','$seat_student')";
    }
    $sql .= implode(',', $valuesArr);
    mysqli_query($conn,$sql);
}*/

$conn->close();

 header('Location: ../profile.php');

?>
