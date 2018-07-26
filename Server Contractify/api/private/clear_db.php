<?php

    include("../common/db.php");
    
    $query = "TRUNCATE `dd_client`;";
    $query_res = mysqli_query($conn,$query);
    $query = "TRUNCATE `dd_contract_history	`;";
    $query_res = mysqli_query($conn,$query);
    $query = "TRUNCATE `dd_contract_main`;";
    $query_res = mysqli_query($conn,$query);
    $query = "TRUNCATE `dd_legal_mapping`;";
    $query_res = mysqli_query($conn,$query);
    $query = "TRUNCATE `dd_service_mapping`;";
    $query_res = mysqli_query($conn,$query);
    $query = "TRUNCATE `dd_sla_mapping`;";
    $query_res = mysqli_query($conn,$query);
    $query = "TRUNCATE `dd_static_contract`;";
    $query_res = mysqli_query($conn,$query);

?>