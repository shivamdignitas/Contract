<?php
	
	include("../common/db.php");
   	$id = ($_POST['id']);
	ECHO "SHIVAM";
    $final_array = mysqli_query($conn,"UPDATE `dd_static_contract` SET `is_deleted`= 1 WHERE id='".$id."'");
    ECHO $final_array;
    ECHO "SHIVAM";
    $data_after_json_encoding = json_encode($final_array);
    
    echo $data_after_json_encoding;

 ?>