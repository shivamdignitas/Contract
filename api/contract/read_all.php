<?php 

    include("../common/db.php");
    
	$data_from_db = "SELECT * FROM ((dd_client AS A INNER JOIN dd_contract_main AS B ON A.client_id = B.client_id) INNER JOIN dd_company AS C ON A.company_id = C.company_id) WHERE B.is_deleted ='0' ORDER BY B.contract_id DESC limit 10";


    $result = mysqli_query($conn,$data_from_db);
    
    $final_array = array();

    while ($row = mysqli_fetch_assoc($result)) {
    	array_push($final_array, $row);
    }
    //print_r($final_array);
    
    $data_after_json_encoding = json_encode($final_array);
    
    echo $data_after_json_encoding;

?>