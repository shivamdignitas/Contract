<?php 

	include("../common/db.php");

   	$id = $_POST['id'];
   	$subid = $_POST['subid'];
   	$subsubid = $_POST['subsubid'];

    $master = mysqli_query($conn,"UPDATE dd_service_list SET is_deleted = 1 WHERE id = '".$id."'");
    $sub = mysqli_query($conn,"UPDATE dd_service_list SET is_deleted = 1 WHERE id = '".$subid."'");
    $subsub = mysqli_query($conn,"UPDATE dd_service_list SET is_deleted = 1 WHERE id = '".$subsubid."'");

?>