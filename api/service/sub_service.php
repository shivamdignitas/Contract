<?php

	include("../common/db.php");

	$subid = $_GET['subid'];
	$newSubService = $_GET['sub_service'];

	// $subid = 7;

	$query = "UPDATE dd_service_list SET service_name = '".$newSubService."' WHERE id = '".$subid."'";

	$sql = mysqli_query($conn, $query);

	echo(json_encode($sql));
?>