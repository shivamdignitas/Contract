<?php 

    include("../common/db.php");
    
	$data_from_db = "SELECT * FROM `dd_contract_main` LEFT JOIN `dd_client` ON dd_contract_main.client_id = dd_client.client_id WHERE `is_deleted` ='0'";


    $result = mysqli_query($conn,$data_from_db);
    
    $final_array = array();

    while ($row = mysqli_fetch_assoc($result)) {
    	array_push($final_array, $row);
    }
    //print_r($final_array);
    
    $data_after_json_encoding = json_encode($final_array);
    
    echo $data_after_json_encoding;

?>