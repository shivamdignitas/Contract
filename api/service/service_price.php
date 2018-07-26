<?php

	include("../common/db.php");

	$subid = $_GET['subid'];
	$newSubServicePrice = $_GET['sub_service'];

	$query = "UPDATE dd_service_list SET service_name = '".$newSubServicePrice."' WHERE id = '".$subid."'";

	$sql = mysqli_query($conn, $query);

	echo(json_encode($sql));
?>