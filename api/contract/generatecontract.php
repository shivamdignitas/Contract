<?php

    include("../common/db.php");
    include("../common/common.php");
    include("../common/fpdf/fpdf.php");
    
    //if(empty($_POST))
    //die("Invalid Argumanets");

    /*$id = $_GET['id'];
    echo $id;
    $client_email_address = filter_var($_POST['client_email_address'], FILTER_SANITIZE_STRING);
    $client_billing_address = ($_POST['client_billing_address']);
    $client_contact_no = filter_var($_POST['client_contact_no'], FILTER_SANITIZE_STRING);
    $client_gstn = filter_var($_POST['client_gstn'], FILTER_SANITIZE_STRING);
    $client_gstn_name = filter_var($_POST['gstn_name'], FILTER_SANITIZE_STRING);
    $client_name = filter_var($_POST['client_name'], FILTER_SANITIZE_STRING);
    $client_pan = filter_var($_POST['client_pan'], FILTER_SANITIZE_STRING);
    $client_payment_terms = filter_var($_POST['client_payment_terms'], FILTER_SANITIZE_STRING);
    $client_spoc = filter_var($_POST['client_spoc'], FILTER_SANITIZE_STRING);
    $contract_description = filter_var($_POST['contract_description'], FILTER_SANITIZE_STRING);
    $contract_end_date = filter_var($_POST['contract_end_date'], FILTER_SANITIZE_STRING);
    $contract_name = filter_var($_POST['contract_name'], FILTER_SANITIZE_STRING);
    $contract_start_date = filter_var($_POST['contract_start_date'], FILTER_SANITIZE_STRING);
    $contract_type = filter_var($_POST['contract_type'], FILTER_SANITIZE_STRING);
    $contract_scope = ($_POST['scope']);
    //print_r($contract_scope);
    $contract_sub_scope = ($_POST['sub_scope']);
    $legal = ($_POST['legal']);
    $sla = ($_POST['sla']);*/
    //print_r($legal);
    $contract_status = $_GET['contract_status'];
    $contract_id = $_GET['contract_id'];
    
    /*$client_id = null;
    $q = "SELECT `client_id` FROM dd_client WHERE `client_pan` = '".$client_pan."' ";
    //echo $q;
    $r = mysqli_num_rows(mysqli_query($conn,$q));
    //echo $r;
    if(!empty($_POST['client_id'])) {
        $client_id = $_POST['client_id'];
    } else {
        //echo "gupta";
        if($r<1){ 
        //echo "shivam"; 
            $query = "INSERT INTO `dd_client`(`client_id`, `company_id`, `client_name`, `client_spoc`, `client_email_address`, `client_contact_no`, `client_pan`, `client_gstn`, `client_gstn_name`, `client_billing_address`, `client_payment_terms`, `client_recurring`) VALUES (NULL,'".$id."','".$client_name."','".$client_spoc."','".$client_email_address."','".$client_contact_no."','".$client_pan."','".$client_gstn."','".$client_gstn_name."','".$client_billing_address."','".$client_payment_terms."','0')";
            //echo $query;
            $result_1 = mysqli_query($conn,$query);
            //echo $result_1;
        }
        
        if($result_1 == 1) {
            $client_id = mysqli_insert_id($conn);
        } else {
            die("Error in inserting client.");
        }
    }

    $query_2 = "INSERT INTO `dd_contract_main` (`contract_id`, `client_id`, `contract_name`, `contract_start_date`, `contract_end_date`, `contract_description`, `contract_type`,`contract_status`, `last_modified`) VALUES (NULL, '".$client_id."', '".$contract_name."', '".$contract_start_date."', '".$contract_end_date."', '".$contract_description."', '".$contract_type."', '0', ".time().");";

    $result_2 = mysqli_query($conn,$query_2);
    
    print_r($result_3);

    $contract_id = null;

    if($result_2 == 1) {
        $contract_id = mysqli_insert_id($conn);
        $size = count($legal);

    
        for($i=1;$i<=$size;$i++){
            $query1 = "INSERT INTO `dd_legal_mapping` (`map_id`,`contract_id`,`legal_id`,`legal_name`) VALUES (NULL, '".$contract_id."','".$legal[$i-1]['id']."','".$legal[$i-1]['name']."');";
            $res = mysqli_query($conn,$query1);
        }
        $size = count($sla);
        for($i=1;$i<=$size;$i++){
            $query7 = "INSERT INTO `dd_sla_mapping` (`map_id`,`contract_id`,`sla_id`,`sla_name`) VALUES (NULL, '".$contract_id."','".$sla[$i-1]['id']."','".$sla[$i-1]['name']."');";
            $res1 = mysqli_query($conn,$query7);
        }

        $size = count($contract_scope);
        for($i=0;$i<$size;$i++) {
            $query3 = "INSERT INTO `dd_service_mapping` (`map_id`,`contract_id`, `service_list_id`,`price`,`comment`) VALUES (NULL ,'".$contract_id."','".$contract_scope[$i]['id']."','".$contract_scope[$i]['price']."','".$contract_scope[$i]['comment']."');";
            $result = mysqli_query($conn,$query3);
        }

        $size = count($contract_sub_scope);
        for($i=0;$i<$size;$i++) {
            $query3 = "INSERT INTO `dd_service_mapping` (`map_id`,`contract_id`, `service_list_id`,`price`,`comment`) VALUES (NULL ,'".$contract_id."','".$contract_sub_scope[$i]['id']."',NULL,'N.A.');";
            $result = mysqli_query($conn,$query3);
        }

        $tm = time();
        $query_3 = "INSERT INTO `dd_contract_history` (`id`,`contract_id`, `contract_name`,`history`, `name`) VALUES (NULL, '".$contract_id."', '".$contract_name."','".$tm."', 'dd_c".$contract_id."_".$tm.".pdf')";
        $result_3 = mysqli_query($conn,$query_3);*/

        $query4 = "SELECT SUM(price) as `price` FROM dd_service_mapping INNER JOIN dd_service_list ON dd_service_mapping.service_list_id = dd_service_list.id WHERE `contract_id` ='".$contract_id."' AND `service_price` != 0 GROUP BY `parent_id` ";
        $value =  mysqli_query($conn,$query4);
        $query5 = "SELECT `service_list_id`, `service_name` FROM dd_service_mapping INNER JOIN dd_service_list ON dd_service_mapping.service_list_id = dd_service_list.id  WHERE `contract_id` = '".$contract_id."'";
        $value1 =  mysqli_query($conn,$query5);

        $query8 = "SELECT a.*,b.service_name as parent FROM dd_service_list a INNER JOIN dd_service_list b ON a.id = b.parent_id INNER JOIN (SELECT `parent_id`,`service_name` FROM dd_service_list INNER JOIN dd_service_mapping ON dd_service_list.id = dd_service_mapping.service_list_id WHERE `contract_id` = '".$contract_id."' AND dd_service_list.`service_price` IS  NULL) as ABC ON b.service_name = ABC.service_name WHERE b.service_price IS NULL AND a.service_price IS NOT NULL";
        $value4 = mysqli_query($conn,$query8);
        


        $query10 = "SELECT a.*,b.service_name as parent FROM dd_service_list a INNER JOIN dd_service_list b ON a.id = b.parent_id INNER JOIN (SELECT `parent_id`,`service_name` FROM dd_service_list INNER JOIN dd_service_mapping ON dd_service_list.id = dd_service_mapping.service_list_id WHERE `contract_id` = '".$contract_id."') as ABC ON b.service_name = ABC.service_name WHERE a.service_price IS NULL";
        $value10 = mysqli_query($conn,$query10);
        $value6 = mysqli_query($conn,$query10);
        
        $query11 = "SELECT `legal_name` FROM dd_legal_mapping INNER JOIN dd_legal ON dd_legal.id=dd_legal_mapping.legal_id WHERE `contract_id` = '".$contract_id."'";
        $value11 = mysqli_query($conn,$query11);

        $query12 = "SELECT `sla_name` FROM dd_sla_mapping INNER JOIN dd_legal ON dd_legal.id=dd_sla_mapping.sla_id WHERE `contract_id` = '".$contract_id."'";
        $value12 = mysqli_query($conn,$query12);
        //`_r($value11);
        $query13 = "SELECT * FROM ((dd_client AS A INNER JOIN dd_contract_main AS B ON A.client_id = B.client_id) INNER JOIN dd_company AS C ON A.company_id = C.company_id) WHERE B.is_deleted ='0' ORDER BY B.contract_id";
        $value13 = mysqli_query($conn,$query13);
        $row = mysqli_fetch_assoc($value13);
        /*echo $row['client_name'];
        echo $row['client_spoc'];
        echo $row['contract_type'];
        echo $row['contract_start_date'];
        echo $row['contract_end_date'];*/
        $client_name = $row['client_name'];
        $client_spoc = $row['client_spoc'];
        $contract_type = $row['contract_type'];
        $contract_start_date = $row['contract_start_date'];
        $contract_end_date = $row['contract_end_date'];

        class PDF extends FPDF {
            function Header() {
                global $client_name, $client_spoc, $contract_start_date, $contract_end_date, $contract_type, $host_url;

                $this->Image($host_url.'images/DDlogo.png',5,15,25);
                $this-> SetX(45);

                $this -> SetFont('Arial','B', 12);
                $this -> SetTextColor(187,0,0);
                $this -> Cell(150,10,"Scope of Work",0,1,'C');
                $this-> SetX(45);

                $this -> SetFont('Arial','B', 8);
                $this-> Cell(150,10,"Client Name:  ",1,0);

                $this -> SetTextColor(0,0,0);
                $this -> SetFont('Arial','', 8);
                $this-> Text(72,26,$client_name);
                $this->Ln();

                $this -> SetTextColor(187,0,0);
        
                $this-> SetX(45);
                $this -> SetFont('Arial','B', 8);
                $this-> Cell(150,10,"Client SPOC: ",1,0);

                $this -> SetTextColor(0,0,0);
                $this -> SetFont('Arial','', 8);
                $this-> Text(72,36,$client_spoc);
                $this->Ln();

                if($contract_type == 1) {
                    $this -> SetTextColor(187,0,0);
                    $this-> SetX(45);
                    $this -> SetFont('Arial','B', 8);
                    $this-> Cell(150,10,"Contract Type:",1,0);
                    $this -> SetTextColor(0,0,0);
                    $this -> SetFont('Arial','', 8);
                    $this-> Text(72,46,"Digital Marketing");
                    $this->Ln();
                } else if($contract_type == 2) {
                    $this -> SetTextColor(187,0,0);
                    $this-> SetX(45);
                    $this -> SetFont('Arial','B', 8);
                    $this-> Cell(150,10,"Contract Type: ",1,0);
                    $this -> SetTextColor(0,0,0);
                    $this -> SetFont('Arial','', 8);
                    $this-> Text(72,46,"Technical");
                    $this->Ln();

                } else {
                    $this -> SetTextColor(187,0,0);
                    $this-> SetX(45);
                    $this -> SetFont('Arial','B', 8);
                    $this-> Cell(150,10,"Contract Type: ",1,0);
                    $this -> SetTextColor(0,0,0);
                    $this -> SetFont('Arial','', 8);
                    $this-> Text(72,46,"Digital Marketing and Technical");
                    $this->Ln();
                }  
                $this -> SetTextColor(187,0,0);  
                $this-> SetX(45);
                $this -> SetFont('Arial','B', 8);
                $this-> Cell(150,10,"Contract Start date:",1,0);
                $this -> SetTextColor(0,0,0);
                $this -> SetFont('Arial','', 8);
                $this-> Text(78,56,$contract_start_date);
                $this-> Ln();

                $this -> SetTextColor(187,0,0);  
                $this-> SetX(45);
                $this -> SetFont('Arial','B', 8);
                $this-> Cell(150,10,"Contract End date:",1,0);
                $this -> SetTextColor(0,0,0);
                $this -> SetFont('Arial','', 8);
                $this-> Text(78,66,$contract_end_date);
                $this-> Ln(15);
               
            }

            public function Footer() {
                $this->SetY(-15);
                $this -> SetFont('Arial','', 6);
                $this-> SetTextColor(187,0,0);
                $this->Cell(0,2,'  Dignitas Digtal Pvt Ltd                                                                                                                                                                                                        Digital Marketing | Web | Mobile Apps | Software ',0,1,'L');
                $this-> Cell(0,2,'______________________________________________________________________________________________________________________________________________________________',0,1);
                $this->Cell(0,4,'  1/4, Najafgarh Rd, Block 1, Tilak Nagar, New Delhi, Delhi 110018(regd.)                                                                                                                +91-11-45501210[phone]         www.dignitasdigital.com',0,1,'');
            }

        }
        
        $pdf = new PDF();
        $pdf -> AddPage();
        $pdf -> SetTextColor(0,0,0);
     
        $mjrArray = array();

    
    while ($row10 = mysqli_fetch_assoc($value10)) {
        if(!array_key_exists($row10['service_name'], $mjrArray)) {
            $mjrArray[$row10['service_name']] = array();
        }
        $mjrArray[$row10['service_name']][$row10['parent']] = array();
        $value8 = mysqli_query($conn,$query8);
        while ($row8 = mysqli_fetch_assoc($value8)) {
            if($row8['service_name'] == $row10['parent']) {
                array_push($mjrArray[$row10['service_name']][$row10['parent']], $row8['parent']);
            }
        }
    }

    $str ='';
    $t = true; $q = false;
    $count = 0;
    foreach ($mjrArray as $l1_key => $l1_val) {
        if($q) {
            $pdf->Ln();
            $q = false;
        }
        $pdf -> SetFont('Arial','B', 10);
        $pdf -> SetTextColor(66,95,244);
        $pdf-> MultiCell(150,6," ".$l1_key,0,'L');
       
        foreach ($l1_val as $l2_key => $l2_val) {
           $pdf -> SetTextColor(0,0,0);
           $pdf -> SetFont('Arial','B', 8);

           if($l2_key == 'Facebook' || $l2_key == 'Twitter' || $l2_key == 'Instagram' || $l2_key == 'LinkedIn') {  

                if($t) {    
                            
                            $pdf -> SetFont('Arial','B', 8);
                            $y = $pdf->GetY();
                            $x = $pdf->GetX($pdf->MultiCell(250,5,"    - Account Management of:",0,'L'));
                            

                            
                            
                            $t = false;
                       } 
                else {
                            $pdf -> SetFont('Arial','', 8);
                            $pdf->MultiCell(250,5,"          * ".$l2_key,0,'L');

                            //$count++;
                //       $y1 = $pdf->SetY($y);
                //         $pdf -> SetFont('Arial','B', 8);
                //         if($count == 1){
                //             $x1 = $pdf->SetX($x +12);
                //             $pdf->Cell(250,5,",".$l2_key,0,0,'L');
                //         }
                //         if($count ==2){
                //             $x2 = $pdf->SetX($x1 +12);
                //             $pdf->Cell(250,5,",".$l2_key,0,0,'L');
                //         }
                //         if($count ==3){
                //             $x3 = $pdf->SetX($x2 +12);
                //             $pdf->Cell(250,5,",".$l2_key,0,0,'L');
                //         }
                    }
                
                $q = true;
            }
            else{
                    $pdf -> SetFont('Arial','B', 8);
                    $pdf-> MultiCell(250,5,"    - ".$l2_key,0,'L');
                    
            
                if($l2_key == 'On Page') {
                    $pdf -> SetFont('Arial','', 8);
                    $pdf -> SetTextColor(0,0,0);
                    $pdf-> MultiCell(150,4,"         * Recommendations for Improving on-page SEO",0,'L');
                    $pdf-> MultiCell(150,4,"         * Keyword Research & Targeting",0,'L');
                    $pdf-> MultiCell(150,4,"         * HTML/Code Update Recommendations",0,'L');
                    $pdf-> MultiCell(150,4,"         * Content Writing & Optimization Recommendations",0,'L');
                    $pdf-> MultiCell(150,4,"         * Optimized URL Structure Recommendations",0,'L');
                    $pdf-> MultiCell(150,4,"         * Index submissions, as applicable",0,'L');
                }
                else {
                        foreach ($l2_val as $l3_key => $l3_val) {
                            $pdf -> SetFont('Arial','', 8);
                            $pdf -> SetTextColor(0,0,0);
                            $pdf-> MultiCell(150,4,"          *".$l3_val,0,'L');
                }   
            }
        }
    }
 }   

        $pdf -> SetFont('Arial','B', 10);
        $pdf -> SetTextColor(66,95,244);
        $pdf-> Write(10,"PRICING");
        $pdf -> SetTextColor(0,0,0);
        $pdf-> Ln(10);
        $pdf -> SetFont('Arial','',8);
        $serv = array();

        while ($row2 = mysqli_fetch_assoc($value6)){
            if(!in_array($row2['service_name'],$serv)){
                array_push($serv, $row2['service_name']); 
            }
        }
        
        $i=0;
        while ($row4 = mysqli_fetch_assoc($value)) {
            $pdf-> Cell(150,5,($i+1)." ".$serv[$i],0,0,'L');
            
            $pdf-> MultiCell(150,5,"INR ".$row4['price']." exclusive of GST",0,'L');
            $i++;
        }
        
        $pdf-> MultiCell(150,5,"-Applicable taxes additional(Currently GST @ 18%)",0,'L');
        $pdf->Ln(3);
        if($contract_status!=0)
        {
            $pdf -> AddPage();
                $pdf -> SetFont('Arial','B', 10);
                $pdf -> SetTextColor(66,95,244);
                $pdf-> Write(10,"LEGAL");
                $pdf-> Ln(7);
                $pdf -> SetFont('Arial','', 7);
                $pdf -> SetTextColor(0,0,0);
                $pdf-> Write(5,"By signing this estimate client is agreeing to:");
                $pdf-> Ln(8);
                while ($row11 = mysqli_fetch_assoc($value11)){
                    //print_r($row7);
                    $pdf-> MultiCell(150,4,"- ".$row11['legal_name'],0,'L');
                    $pdf-> Ln(2);
                }
        
                $pdf -> SetFont('Arial','B', 10);
                $pdf -> SetTextColor(66,95,244);
                $pdf-> Write(10,"Service Level Agreement");
                $pdf-> Ln(7);
                $pdf -> SetFont('Arial','', 7);
                $pdf -> SetTextColor(0,0,0);
                $pdf-> Ln(8);
                while ($row12 = mysqli_fetch_assoc($value12)){
                    //print_r($row7);
                    $pdf-> MultiCell(150,4,"- ".$row12['sla_name'],0,'L');
                    $pdf-> Ln(2);
                }
            }

        $filename= "dd_c".$contract_id."_".$contract_status.".pdf"; 
        //$filename1= "dd_c".$contract_id."_".$tm.".pdf"; 

        $filelocation = "../../generated/contractgenerated/";
        //$filelocation1 = "../../generated/logs/";

        $fileNL = $filelocation.$filename;
        //$fileNL1 = $filelocation1.$filename1;

        $pdf->Output($fileNL,'F');
        //$pdf->Output($fileNL1,'F');
        echo $filename;
        echo $pdf;
    /*} else {
        die("Error in inserting client.");
    }*/
    
    //die();
?>