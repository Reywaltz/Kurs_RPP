<?php
		$host = 'localhost';
		$database = 'users';
		$user = 'root';
		$connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
		echo 'HI'; 
		if (isset($_POST['auth'])
		{
			echo "HELLO";
			$login = $_POST['login'];
			$password = $_POST['password'];
			$query = "SELECT * FROM `users` WHERE login = 'admin' AND password = 'admin'";
			$result = mysql_query($connection, $query) or die(mysql_error($connection));
			
			if (mysqli_num_rows($result) == 1){
				echo 'SUCCESS';
			}
			else{
				$fmsg = "Error";
			}
		}
		?>