<?php

    include("../common/db.php");

    
    $query = "SELECT * FROM dd_service_list WHERE `is_check` = 1";
   
	$query_res = mysqli_query($conn,$query);

    $ret_array = array();
    while ($row = mysqli_fetch_assoc($query_res)) {
    	array_push($ret_array, $row);
    }
    //print_r($ret_array);
    $ret_array = json_encode($ret_array);
    // echo "sfdsgd";
    echo $ret_array;


?>