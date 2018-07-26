<?php

	include("../common/db.php");

	$id = $_GET['id'];
	$subid = $_GET['subid'];
	$subsubid = $_GET['subsubid'];


    // $id = 1;
    // $subid = 7;
    // $subsubid = 17;

	$masterservice = "SELECT service_name as masterservice FROM dd_service_list WHERE id ='".$id."'";
	$master = mysqli_query($conn, $masterservice); 
	$ret_array = array();
    while ($row = mysqli_fetch_assoc($master)) {
    	array_push($ret_array, $row);
    }

	$subservice = "SELECT service_name as subservice FROM dd_service_list WHERE id ='".$subid."'";
	$sub = mysqli_query($conn, $subservice);
    while ($row = mysqli_fetch_assoc($sub)) {
    	array_push($ret_array, $row);
    }

    $subserviceprice = "SELECT service_price as subserviceprice FROM dd_service_list WHERE id ='".$subid."' ";
    $subprice = mysqli_query($conn, $subserviceprice);
    while ($row = mysqli_fetch_assoc($subprice)) {
        array_push($ret_array, $row);
    }

	$subsubservice = "SELECT service_name as subsubservice FROM dd_service_list WHERE id ='".$subsubid."'";
	$subsub = mysqli_query($conn, $subsubservice);
    while ($row = mysqli_fetch_assoc($subsub)) {
    	array_push($ret_array, $row);
    }

    $ret_array = json_encode($ret_array);
    echo $ret_array;
?>