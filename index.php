  <?php
	include 'api/common/common.php';

	session_start();
	//print_r($_SESSION);
	if(!empty($_SESSION) && isset($_SESSION['logged_in']) && ($_SESSION['logged_in']==true)) {
		if($_SESSION['type']==1) {
			header("Location: ".$host_url."user/index.php");
			die();
		} else if($_SESSION['type']==0) {
			header("Location: ".$host_url."admin/dashboard.php");
			die();
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	 crossorigin="anonymous">
	<link href="css/style_user.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-color: #f0f0f0">
	<?php include "includes/nav.php"; ?>
	<div class="container-fluid">

		
		
		<div class="log">
			<h2>Login</h2>
		</div>
		<form id="login" name="login">
			<div class="login-box">
				<div class="col-sm-12">
					<label for="uname">
						<b>Username</b>
					</label>
					<input type="text" placeholder="Enter Username" name="uname" />
				</div>
				<div class="col-sm-12">
					<label for="pwd">
						<b>Password</b>
					</label>
					<input type="password" placeholder="Enter Password" name="pwd" />
				</div>
				<div class="col-sm-12">
					<input type="submit" id="submit" value="Login" />
					<p> New User?<a href="register.php"> Register</a></p>
					<a href="forgotpassword.php">forgot Password</a>
				</div>
				
				
				<div class="clr"></div>
			</div>
		</form>

	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="js/common.js"></script>
	<script src="js/login.js"></script>

</body>

</html>