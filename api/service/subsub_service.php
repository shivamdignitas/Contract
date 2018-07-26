<?php

	include("../common/db.php");

	$subsubid = $_GET['subsubid'];
	$newSubSubService = $_GET['subsub_service'];

	$query = "UPDATE dd_service_list SET service_name = '".$newSubSubService."' WHERE id = '".$subsubid."'";

	$sql = mysqli_query($conn, $query);

	echo(json_encode($sql));
?>