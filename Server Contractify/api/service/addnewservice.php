<?php


   error_reporting(E_ALL);
   ini_set('display_errors', 1);

   $user_name = "root";
   $pw = "";
   $database = "ccsqadig_testdb";
   $server = "localhost";
   $conn = new mysqli($server,$user_name,$pw,$database);
   if($conn->connect_error){
      die("connection failed: " .$conn->connect_error);
   }
   
   $masterService = "";
   $subService = "";
   $subServicePrice = "";
   $subSubService = "";
   $selectedservice = "";
   $selected = "";
   $dropdown = "";
   $count = "";

   if(isset($_GET["done"]))
   { 
      if(isset($_GET["selectmaster"])){
         $selectedservice = $_GET["selectmaster"]; 
         $dropdown = 1; 
      }
    
      if(isset($_GET["masterservice"])){

         $selected = $_GET["masterservice"];
         $masterService = $_GET["masterservice"];

         $existing = mysqli_query($conn, "SELECT id FROM dd_service_list WHERE service_name = '".$selected."'");
         while($row=mysqli_fetch_array($existing, MYSQLI_NUM)) 
         {
            $existingid=$row[0];     
         } 


         $check = mysqli_query($conn, "SELECT id FROM dd_service_list WHERE service_name = '".$selected."'");
         $count = mysqli_num_rows($check);
         if($count>0){
            $exists = 1;
            echo "Already Exists! <br>";
         }
         else
         {
            $exists = 0;
            echo "Does not Exist!";
            $master  = "INSERT INTO dd_service_list(parent_id, service_name, service_price, is_check, is_deleted) 
            VALUES (NULL,'".$masterService."',NULL,1,0)";

            $masterinsert = mysqli_query($conn, $master);

            if($masterinsert){
               echo "Inserted<br>";
            }
            else{
               echo "Error<br>".mysqli_error($conn);
            }
         }

         
         $master  = "INSERT INTO dd_service_list(parent_id, service_name, service_price, is_check, is_deleted) 
                     VALUES (NULL,'".$masterService."',NULL,1,0)";

         $masterinsert = mysqli_query($conn, $master);

         if($masterinsert){
            echo "Inserted<br>";
         }
         else{
            echo "Error<br>".mysqli_error($conn);
         }
      }

      if((isset($_GET["subservice"]) || isset($_GET["subserviceprice"])) && ($exists == 0)){

         $subService = $_GET["subservice"];
         $subServicePrice = $_GET["subserviceprice"];

         $maxid = mysqli_query($conn,"SELECT max(id) as max FROM dd_service_list");
         while($row=mysqli_fetch_array($maxid, MYSQLI_NUM)) 
         {
            $maxresult=$row[0];     
         } 

         $sub  = "INSERT INTO dd_service_list(parent_id, service_name, service_price, is_check, is_deleted) 
                  VALUES ('".$maxresult."','".$subService."','".$subServicePrice."',1,0)";

         $subinsert = mysqli_query($conn, $sub);
         if($subinsert){
            echo "Inserted<br>";
         }
         else{
            echo "Error<br>";
         }
      }else if((isset($_GET["subservice"]) || isset($_GET["subserviceprice"])) && ($exists == 1)){

         $subService = $_GET["subservice"];
         $subServicePrice = $_GET["subserviceprice"];

         $sub  = "INSERT INTO dd_service_list(parent_id, service_name, service_price, is_check, is_deleted) 
                  VALUES ('".$existingid."','".$subService."','".$subServicePrice."',1,0)";

         $subinsert = mysqli_query($conn, $sub);
         if($subinsert){
            echo "Inserted<br>";
         }
         else{
            echo "Error<br>";
         }
      }

      

      if(isset($_GET["subsubservice"]) && is_array($_GET["subsubservice"])){
         $subSubService = implode(",", $_GET["subsubservice"]);
         $subSubArr = array(); 
         $subSubArr = explode(",", $subSubService);
         $size = count($subSubArr);
         
         for($i = 0; $i < $size; $i++){
            $maxparentid = mysqli_query($conn,"SELECT max(id) as max FROM dd_service_list");

            while($row1=mysqli_fetch_array($maxparentid, MYSQLI_NUM)) 
            {
               $maxresult1=$row1[0];
               // echo $maxresult1;            
            }

            $subsub = "INSERT INTO dd_service_list(parent_id, service_name, service_price, is_check, is_deleted) 
                     VALUES ('".$maxresult1."'-'".$i."','".$subSubArr[$i]."',NULL,1,0)";

            $subsubinsert = mysqli_query($conn, $subsub);

            if($subsubinsert){
            echo "Inserted<br>";
            }
            else{
               echo "Error<br>";
            }   
         }
      }
      echo "Exoisting ID: ".$existingid."<br>";
      echo "Selected: ".$selected."<br>";
      echo "Count of Rows: ".$count."<br>";
      echo "Exists? 1(Yes) 0(No): ".$exists;
      // echo "Master Service: ".$masterService."<br>";
      // echo "Sub Service: ".$subService."<br>";
      // echo "Sub Service Price: ".$subServicePrice."<br>";
      // echo "<pre>";
      // print_r($subSubArr);
      // echo "</pre>";

      // for($i = 0; $i < $size; $i++){
      //    echo $subSubArr[$i];
      // }
   }
?>