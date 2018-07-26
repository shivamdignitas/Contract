<?php
    include '../api/common/common.php';

    session_start();
    if(empty($_SESSION) || !isset($_SESSION['logged_in']) || ($_SESSION['logged_in']!=true) || ($_SESSION['type']!=0)) {
        header("Location: ".$host_url."index.php");
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Service</title>
	<?php include '../includes/admin-header-path.php';?>
</head>
<body>
<div class="container-fluid">
        <div class="row heading">
            <div class="col-sm-10">
                <div class="logo logoleft">
                    <img src="../images/logo.png" />
                </div>
            </div>
            <div class="col-sm-2 ">
                <a id="link_1" href="http://localhost/contractify/admin/addeditservices.php" class="btn btn-primary pull-right" role="button" aria-pressed="true">Back</a>
            </div>
        </div>
        <div class="main-container">
            <div class="row sub-heading">
                <div class="col-sm-12">
                    <h2 class="contract_name_head">Add a New Service</h2>
                </div>
            </div>
            <div class ="update_con">
            <div class="success-alert-overlay">
                <div class="row success-alert">
                    <div class="col-sm-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            <p>Service has been successfully updated.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <form id="create_contract1" enctype="multipart/form-data">
                <div class="col">

                    <div class="row-sm-4">
                        <div class="form-sec">
                            <div class="addnewbox">
                              <form action="" method="get" name="" >  
                                <h3>Enter New Service</h3>
                                <ul>
                                    <li>
                                        <label for="client_name">Master Service<span style="color:red">*</span></label>
                                        <input type="text" id="masterservice" name="masterservice">
                                    </li>
                                </ul>
                                <div class="subservice_field">
                                	

                                    <!-- <ul style="margin-left:5%">    
                                        <li>
                                            <div class="subservice_field">
                                            	<label for="client_spoc">Sub Service</label>
                                            	<input type="text" id="subservice" name="newsubservice[]">
                                            	<label for="client_spoc">Enter Sub Service Price</label>
                                            	<input type="text" id="subservice" name="newsubserviceprice[]">
                                        	</div>
                                        </li>
                                    </ul>
                                    <ul style="margin-left:10%">
                                        <li>
    	                                        <label for="client_contact_no">Sub-Sub Service</label>
    	                                        <input type="text" id="subsubservice" name="newsubsubservice[]">
                                        </li>
                                </ul> -->

                                </div>
                               </form> 
                            </div>
                            <div class="clr"></div>
                            <div class="subbig">
                            	<button type="button" class="add_subservice">Add More Sub Service</button>
                            	<!-- <button type="button" class="add_subsubservice" style="margin-right: 20%">Add More Sub-Sub Service</button> -->
                            </div>
                            <div class="leagel-btn">
                            	<input type="button" id="done" value="Done" name="addservice" class="btn btn-primary">
                            </div>
                            <?php
                                include '../api/service/newservice.php';
                            ?>
                            
                        </div>
            </form>
            </div>
            </div>


            <!-- Include JQuery - A JS library to make life easier -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>

            <script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

            <!-- Include our app.js file, this will contain the logic on frontend -->
            <script src="../js/common.js"></script>
            <script src="../js/newservice.js"></script>

</body>
</body>
</html>