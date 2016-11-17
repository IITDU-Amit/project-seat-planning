<?php

require_once '../libs/PHPMailer/PHPMailerAutoload.php';

$email = new PHPMailer;

$email->isSMTP();
$email->SMTPAuth = true;
/*$email->SMTPDebug = 2;*/

$email->Host = 'smtp.gmail.com';
$email->Username = 'iitdu.seatplanning@gmail.com';
$email->Password = 'iit123456';
$email->SMTPSecure = 'ssl';
$email->Port = 465;

$email->From = 'iitdu.seatplanning@gmail.com';
$email->FromName = 'Seat Planning System';
$email->addReplyTo('iitdu.seatplanning@gmail.com', 'Seat Planning System');

?>
