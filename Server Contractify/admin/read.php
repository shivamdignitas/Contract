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

<body>

    <div class="container-fluid">
        <div class="row heading">
            <div class="col-sm-10">
                <div class="logo logoleft">
                    <img src="../images/logo.png" />
                </div>
            </div>
            <div class="col-sm-2 ">
                <a id="link_1" href="dashboard.php" class="btn btn-primary pull-right" role="button" aria-pressed="true">Back</a>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="col-sm-12">
            <h2 class="contract_name_head"></h2>
        </div>


        <form enctype="multipart/form-data">
            <div class="col">

                <div class="row-sm-4">
                    <div class="form-sec">
                        <div class="addnewbox">
                            <h3>Client Details</h3>
                            <ul>
                                <li>
                                    <label for="client_name">Client Name</label>
                                    <input type="text" id="client_name" name="client_name" readonly>
                                </li>
                                <li>
                                    <label for="client_spoc">Client SPOC</label>
                                    <input type="text" id="client_spoc" name="client_spoc" readonly>
                                </li>
                                <li>
                                    <label for="client_contact_no">Client Contact Number</label>
                                    <input type="text" id="client_contact_no" name="client_contact_no" readonly>
                                </li>
                                <li>
                                    <label for="client_pan">Client PAN</label>
                                    <input type="text" id="client_pan" name="client_pan" readonly>
                                </li>
                                <li>
                                    <label for="client_GSTN">Client GSTN</label>
                                    <br />
                                    <a id='gstn_preview' download='' href=''></a>
                                </li>
                                <li>
                                    <label for="client_billing_address">Client Billing Address</label>
                                    <input type="text" id="client_billing_address" name="client_billing_address" readonly>
                                </li>
                                <li>
                                    <label for="client_payment_terms">Client Payment Terms</label>
                                    <input type="text" id="client_payment_terms" name="client_payment_terms" readonly>
                                </li>
                                <li>
                                    <label for="client_email_address">Client Email id</label>
                                    <input type="text" id="client_email_address" name="client_email_address" readonly>
                                </li>
                                <!-- <label for="client_gstn">Client GSTN</label>
                        <input type="file" name="fileToUpload" id="client_gstn"> 
                        <input type="hidden" id="client_id" name="client_id" value="">-->
                            </ul>

                        </div>

                    </div>
                    <div class="row-sm-4">

                        <div class="form-sec">
                            <div class="addnewbox">
                                <h3>Contract Details</h3>
                                <ul>
                                    <li>
                                        <label for="contract_name">Contract Name</label>
                                        <input type="text" id="contract_name" name="contract_name" readonly>
                                    </li>
                                    <li>
                                        <label for="contract_type">Contract Type</label>
                                        <input type="text" id="contract_type" name="contract_type" readonly>
                                    </li>
                                    <li>
                                        <label for="contract_start_date">Contract Start Date</label>
                                        <input type="text" name="contract_start_date" id="contract_start_date" readonly>
                                    </li>
                                    <li>
                                        <label for="contract_end_date">Contract End Date</label>
                                        <input type="text" name="contract_end_date" id="contract_end_date" readonly>
                                    </li>
                                     <li>
                                        <label for="contract_description">Contract Description</label>
                                        <textarea type="text" id="contract_description" name="contract_description" readonly></textarea>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="row-sm-4">

                            <div class="form-sec seobox">

                                <h3>Scope Details</h3>
                                <br />

                                <ul id="scope_list" name="contract_scope" readonly></ul>

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-sec">
                                <h3>Legal</h3>
                                <ul id="legal" name="legal_terms"></ul>
                            </div>
                            <div class="form-sec">
                                <h3>Service Level Agreement</h3>
                                <ul id="sla" name="sla_terms"></ul>
                            </div>
                        </div>
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
        <script src="../js/read.js"></script>

</body>

</html>