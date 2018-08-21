<?php 

    include("../common/db.php");
    
	//$data_from_db = "SELECT * FROM `dd_contract_history` ";

    $data_from_db = "SELECT *
FROM ((dd_contract_history
INNER JOIN dd_contract_main ON dd_contract_history.contract_id = dd_contract_main.contract_id)
INNER JOIN dd_client ON dd_contract_main.client_id = dd_client.client_id) ORDER BY dd_contract_history.id DESC";


    $result = mysqli_query($conn,$data_from_db);
    
    $final_array = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $row['history'] = "<spans>".$row['history']."</spans>".date('d/m/Y h:i A', $row['history']);
    	array_push($final_array, $row);
    }
    //print_r($final_array);
    
    $data_after_json_encoding = json_encode($final_array);
    
    echo $data_after_json_encoding;

?>