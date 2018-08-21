<?php

    include("../common/db.php");
    $id = $_GET['id'];
    //echo $id;

    $query = "SELECT * FROM `dd_company` INNER JOIN `dd_client` ON dd_company.company_id = dd_client.company_id WHERE dd_company.company_id='".$id."'";

    $query_res = mysqli_query($conn,$query);

    $ret_array = array();

    while ($row = mysqli_fetch_assoc($query_res)) {
    	array_push($ret_array, $row);
    }

    $ret_array = json_encode($ret_array);
    
    echo $ret_array;

?>