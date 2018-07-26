<?php

    include("../common/db.php");

    // $query = "SELECT t1.service_name as MasterService, t2.service_name as SubService, t3.service_name as SubSubService, t2.service_price 
    // FROM dd_service_list as t1 
    // LEFT JOIN dd_service_list as t2 ON t1.id = t2.parent_id 
    // LEFT JOIN dd_service_list as t3 on t2.id = t3.parent_id";

    $query = "SELECT t1.service_name  AS MasterService,
      t1.id            AS id,
      t2.service_name  AS SubService,
      t2.id            AS subid,
      t3.service_name  AS SubSubService,
      t3.id            AS subsubid,
      t4.service_name  AS leaflvl,
      t2.service_price AS ServicePrice,
      t1.is_deleted, t2.is_deleted, t3.is_deleted, t4.is_deleted
FROM   dd_service_list AS t1
      LEFT JOIN dd_service_list AS t2
             ON t1.id = t2.parent_id AND t2.is_deleted = 0
      LEFT JOIN dd_service_list AS t3
             ON t2.id = t3.parent_id AND t3.is_deleted = 0
      LEFT JOIN dd_service_list AS t4
             ON t3.id = t4.parent_id  AND t4.is_deleted = 0
WHERE  t1.parent_id IS NULL AND t1.is_deleted = 0";
   
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
