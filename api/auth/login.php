<?php 
    session_start();
    include("../common/db.php");

    if(isset($_POST["uname"], $_POST["pwd"])) {

    	$username = stripslashes($_POST["uname"]); 
		$username = mysqli_real_escape_string($conn,$_POST["uname"]);

        $password = stripslashes($_POST["pwd"]); 
		$password = mysqli_real_escape_string($conn,$_POST["pwd"]);

		$password = md5($password);

        $result = mysqli_query($conn,"SELECT `username`,`type` FROM dd_login WHERE `username` = '".$username."' AND `password` = '".$password."'");
        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) > 0 ) { 
            $_SESSION["logged_in"] = true; 
            $_SESSION["name"] = $username; 
            $_SESSION["type"] = $row['type'];
            echo $row['type'];
        } else {
            echo 'The username or password are incorrect!';
        }
           
	}
?>