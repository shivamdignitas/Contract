<?php
	if (isset($_GET["token"]) && isset($_GET["email"])) {
		$connection = new mysqli("localhost", "root", "", "ccsqadig_testdb");
		/*$r=$_GET["email"];
		$q=$_GET["token"];
		echo $r;
		echo $q;*/
		$email = $connection->real_escape_string($_GET["email"]);
		$token = $connection->real_escape_string($_GET["token"]);

		$data = $connection->query("SELECT id FROM dd_login WHERE username='".$email."' and token='".$token."'");

		if ($data->num_rows > 0) {
			/*$str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
			$str = str_shuffle($str);
			$str = substr($str, 0, 15);

			$password = md5($str);*/
			header("Location: reset.php?email=".$email."");



			//$connection->query("UPDATE `dd_login` SET `password`='".$password."' WHERE username='".$email."'");

			//echo "Your new password is: '".$str."'";
		} else {
			echo "Please check your link!";
		}
	} else {
		header("Location: index.php");
		exit();
	}
?>