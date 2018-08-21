<?php
	include("../common/db.php");
	if(empty($_POST))
    die("Invalid Argumanets");

    $company_name = ($_POST['cname']); 

	$query = "INSERT INTO `dd_company` (`company_name`) VALUES ('".$company_name."');";
	$result_1 = mysqli_query($conn,$query);
	
	if($result_1!= 1) {
            die("Error in adding company!");
    }
    
    $final_array = json_encode($result_1);
    echo $final_array;
    //echo $contract;


?>