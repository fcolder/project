<?php
require_once('includens/config.php');
// echo "<pre>";
// print_r($_POST);

$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$time=$_POST['time'];
$number=$_POST['number'];
$date=$_POST['date'];
$message=$_POST['message'];

$query=mysqli_query($con,"select id from `booking` where (phone='$phone' or email='$email') and date='$date'");
$check=mysqli_fetch_assoc($query);

if ($check) {
	echo 'no';
	exit();
}
mysqli_query($con,"INSERT INTO `booking` (`name`, `number`, `phone`, `date`, `email`, `message`, `time`) VALUES ('$name', '$number', '$phone', '$date', '$email', '$message', '$time')");

echo 'yes';
exit();

?>