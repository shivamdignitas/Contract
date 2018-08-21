<?php
	include("../common/db.php");
	if(empty($_POST))
    die("Invalid Argumanets");

    $client_name = ($_POST['client_name']); 
	$contract = filter_var($_POST['upload_con'], FILTER_SANITIZE_STRING);
	$file_name = ($_POST['upload_name']);
	$result = "SELECT `client_id` FROM dd_client WHERE `client_name` = '".$client_name."' ";
	$client_id = mysqli_query($conn, $result);
    $row = mysqli_fetch_assoc($client_id);
    

	$query = "INSERT INTO `dd_static_contract` (`client_id`,`contract`, `file_name`) VALUES ('".$row['client_id']."','".$contract."','".$file_name."');";
	$result_1 = mysqli_query($conn,$query);
	
	if($result_1!= 1) {
            die("Error in uploading contract.");
    }
    
    $final_array = json_encode($result_1);
    //echo $final_array;
    echo $contract;


?>