<?php
	include("../common/db.php");

	$query = "SELECT D.id,D.client_id,C.client_name,D.contract,D.file_name,D.upload_time FROM dd_client as C INNER JOIN dd_static_contract as D on C.client_id=D.client_id where is_deleted = 0 order by id desc";
	$result_1 = mysqli_query($conn,$query);

	$ret_array = array();

    while ($row = mysqli_fetch_assoc($result_1)) {
    	array_push($ret_array, $row);
    }

    $ret_array = json_encode($ret_array);
    print_r($ret_array);


?>