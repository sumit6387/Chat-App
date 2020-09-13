<?php
	include('connect.php');
		if(isset($_POST['submit'])){
			$name = $_POST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `users` WHERE `name`='$name' and `password`= '$password'";
			$run = mysqli_query($mysqli , $sql);
			if(mysqli_num_rows($run) > 0){
				$row= mysqli_fetch_assoc($run);
				$_SESSION['accept_by'] = $row['id']; 
				$_SESSION["username"] = $name;
					header('location:dashboard.php');
			}
		}
?>