<?php
	
	include("../common/db.php");
   	$id = ($_POST['id']);
   	//echo $id;
	//ECHO "SHIVAM";
    $final_array = mysqli_query($conn,"UPDATE `dd_company` SET `is_deleted`= 1 WHERE company_id ='".$id."'");
    //ECHO $final_array;
    //ECHO "SHIVAM";
    $data_after_json_encoding = json_encode($final_array);
    
    echo $data_after_json_encoding;

 ?>