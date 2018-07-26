<?php

	include("../common/db.php");

	$id = $_GET['id'];
	$newMasterService = $_GET['master_service'];

	$query = "UPDATE dd_service_list SET service_name = '".$newMasterService."' WHERE id = '".$id."'";

	$sql = mysqli_query($conn, $query);

	echo(json_encode($sql));
?>