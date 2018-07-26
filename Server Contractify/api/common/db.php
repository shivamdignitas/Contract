<?php
	$user_name = "ccsqadig_testdb";
	$pw = "$9vI@aH)+#g#";
	$database = "ccsqadig_testdb";
	$server = "localhost";
	$conn = new mysqli($server,$user_name,$pw,$database);
	if($conn->connect_error){
		die("connection failed: " .$conn->connect_error);
	}
?>