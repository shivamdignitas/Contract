<?php
	
	include("../common/db.php");
   	$contract_id = ($_POST['id']);
	ECHO "SHIVAM";
    $final_array = mysqli_query($conn,"UPDATE `dd_contract_main` SET `is_deleted`= 1 WHERE contract_id='".$contract_id."'");
    ECHO $final_array;
    ECHO "SHIVAM";
    $data_after_json_encoding = json_encode($final_array);
    
    echo $data_after_json_encoding;

 ?>