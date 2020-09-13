<?php  
include('connect.php');
include('validation.php');

$accept_by = $_POST['accept_by'];
$msg = $_POST['msg'];
$id = $_SESSION['accept_by'];
$time = $_POST['time'];
$sql = "INSERT INTO `msg`(`msg`, `send_by`,`time`) VALUES ('$msg' , '$id','$time')";
$run = mysqli_query($mysqli , $sql);


?>