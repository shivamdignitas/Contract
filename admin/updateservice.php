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
     
   <?php include '../includes/admin-header-path.php';?>


</head>

<body id="admin-body">

    <div class="container-fluid">
        <div class="row heading">
            <div class="col-sm-10">
                <div class="logo logoleft">
                    <a href="dashboard.php"><img src="../images/logo.png" /></a>
                </div>
            </div>
            <div class="col-sm-2 ">
                <a id="link_1" href="addeditservices.php" class="btn btn-primary pull-right" role="button" aria-pressed="true">Back</a>
            </div>
        </div>
        <div class="main-container">
            
            <div class ="update_con">
            <div class="success-alert-overlay">
                <div class="row success-alert">
                    <!-- <div class="col-sm-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            <p>Contract has been successfully updated.</p>
                            <hr>
                            <p class="mb-0">
                                <a id="downpdf_link" target="_blank">Click here</a> to download the PDF.</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
            <form id="create_contract1" enctype="multipart/form-data">
                <div class="col">

                    <div class="row-sm-4">
                        <div class="form-sec">
                            <div class="addnewbox">
                                <h3>Update Service Details</h3>
                                <ul>
                                    <li>
                                        <label for="master_service">Master Service<span style="color:red">*</span></label>
                                        <input type="text" id="master_service" name="master_service">
                                        <div><button type="button" id="updatemservice" name="updatemservice">Update Master Service</button></div>
                                    </li>
                                    <li>
                                        <label for="sub_service">Sub Service<span style="color:red">*</span></label>
                                        <input type="text" id="sub_service" name="sub_service">
                                        <div><button type="button" id="updatesservice" name="updatesservice">Update Sub Service</button></div>
                                    </li>
                                    <li>
                                        <label for="sub_service_price">Sub Service Price<span style="color:red">*</span></label>
                                        <input type="text" id="sub_service_price" name="sub_service_price">
                                        <div><button type="button" id="updatespservice" name="updatespservice">Update Service Price</button></div>
                                    </li>
                                    <li>
                                        <label for="sub_sub_service">Sub-Sub Service<span style="color:red">*</span></label>
                                        <input type="text" id="sub_sub_service" name="sub_sub_service">
                                        <div><button type="button" id="updatessservice" name="updatessservice">Update Sub Sub Service</button></div>
                                    </li>
                            </div>
                            <div><button type="button" id="updateservice" name="submit"><a style="color: white" href="addeditservices.php">Done</a></button></div>
                        </div>
                                <!-- <div class="form-sec seobox">

                                    <h3>Scope Details</h3>
                                    <br />

                                    <ul id="scope_list" name="contract_scope"></ul>
                                </div> -->
            </form>
            </div>
            </div>


            <!-- Include JQuery - A JS library to make life easier -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>

            <script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

            <!-- Include our app.js file, this will contain the logic on frontend -->
            <script src="../js/common.js"></script>
            <script src="../js/updateservice.js"></script>

</body>

</html>