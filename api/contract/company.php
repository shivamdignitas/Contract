<?php
	include("../common/db.php");

	$query = "SELECT * FROM dd_company where is_deleted = 0 order by company_id desc";
	$result_1 = mysqli_query($conn,$query);

	$ret_array = array();

    while ($row = mysqli_fetch_assoc($result_1)) {
    	array_push($ret_array, $row);
    }

    $ret_array = json_encode($ret_array);
    print_r($ret_array);


?>