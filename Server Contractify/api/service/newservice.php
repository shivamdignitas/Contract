<?php
include("../common/db.php");
if(isset($_GET["addservice"]))
{
   $masterservice = $_GET["masterservice"];
   $subService = "";
   $subserviceprice = "";
   $subSubService = "";

   if(isset($_GET["subservice"]) && is_array($_GET["subservice"])){
       $subService = implode(",", $_GET["subservice"]);
   }

   if(isset($_GET["subserviceprice"]) && is_array($_GET["subserviceprice"])){
       $subserviceprice = implode(",", $_GET["subserviceprice"]);
   }

   if(isset($_GET["subsubservice"]) && is_array($_GET["subsubservice"])){
       $subSubService = implode(",", $_GET["subsubservice"]);
   }

   $subServiceArr = array();
   $subServiceArr = explode(",",$subService);
   // echo $subService;    
   // echo "<pre>"; 
   //  print_r($subServiceArr);
   // echo "</pre>"; 

   $subSubServiceArr = array();
   $subSubServiceArr = explode(",",$subSubService);
   // echo $subSubService;  
   // echo "<pre>"; 
   //  print_r($subSubServiceArr);
   // echo "</pre>"; 

   $serviceArray = array();

   // for($i = 0; $i < count($subServiceArr); i++){
   //     for($j = 0; $j < count($subSubServiceArr); j++){
               
   //     }        
   // }

   echo "<pre>"; 
   var_dump(json_encode($_GET));
   echo "</pre>"; 
   echo "New Service: <br>";
   echo $masterservice;
}
?>