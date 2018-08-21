<?php

    include("../common/db.php");
    //$id = $_GET['id'];
    //echo $id;

    $query = "SELECT * FROM dd_company where is_deleted = 0";

    $query_res = mysqli_query($conn,$query);

    $ret_array = array();

    while ($row = mysqli_fetch_assoc($query_res)) {
    	array_push($ret_array, $row);
    }

    $ret_array = json_encode($ret_array);
    
    echo $ret_array;

?>