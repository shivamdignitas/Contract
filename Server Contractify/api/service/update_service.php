<?php

	include("../common/db.php");

	$id = $_POST['id'];
	$new_master = $_POST['master_service'];

	$subid = $_POST['subid'];
	$new_sub = $_POST['sub_service'];

	$subsubid = $_POST['subsubid'];
	$new_subsub = $_POST['sub_sub_service'];

	$new_price = $_POST['sub_service_price'];

	$masterservice = "UPDATE dd_service_list SET service_name = '".$new_master."' WHERE id = '".$id."'";
	$master = mysqli_query($conn, $masterservice); 

	$subservice = "UPDATE dd_service_list SET service_name = '".$new_sub."', service_price = '".$new_price."' WHERE id = '".$subid."'";
	$sub = mysqli_query($conn, $subservice);
	

	$subsubservice = "UPDATE dd_service_list SET service_name = '".$new_subsub."', service_price = '".$new_price."' WHERE id = '".$subsubid."'";
	$subsub = mysqli_query($conn, $subsubservice);
	

	// $subserviceprice = "UPDATE dd_service_list SET service_price = '".$new_price."' WHERE id = '".$subid."'";
	// $subprice = mysqli_query($conn, $subserviceprice);
	
?>