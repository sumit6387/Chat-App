<?php  
	include('connect.php');
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "INSERT INTO `users`( `name`, `password`) VALUES ('$username' , '$password')";
		$run = mysqli_query($mysqli , $sql);
		if($run){
			header('location:index.php');
		}else{
			echo 'data not inserted';
		}
	}



?>