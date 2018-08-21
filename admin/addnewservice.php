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
    <style type="text/css">
        #regForm {
          background-color: #ffffff;
          margin: 100px auto;
          padding: 40px;
          width: 70%;
          min-width: 300px;
        }

        /* Style the input fields */
        input, select, option {
          padding: 10px;
          width: 100%;
          border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
          background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
          display: none;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbbbbb;
          border: none; 
          border-radius: 50%;
          display: inline-block;
          opacity: 0.5;
        }

        /* Mark the active step: */
        .step.active {
          opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
          background-color: #37123C;
        }
    </style>
</head>
<body>
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
                                <form id="regForm" action="" method="get">
                                    <!-- One "tab" for each step in the form: -->
                                    <div class="tab">
                                        <h4>Choose from Existing Master Service:</h4>
                                        <select name="selectmaster" id="dropDownId">
                                            <option value="">Select Existing Master Service</option>
                                            <?php
                                              include '../api/common/db.php';

                                              $sql = "SELECT id, service_name FROM dd_service_list WHERE parent_id IS NULL";
                                              $result = mysqli_query($conn, $sql);

                                                while($row = mysqli_fetch_array($result)){
                                                  echo '<option value="'.$row["id"].'">'.$row["service_name"].'</option>';
                                                } 
                                            ?>
                                        </select>
                                        <button type="button" name="select" id="select">Select</button>
                                        <h3>Master Service:</h3> 
                                      <p><input name="masterservice" id="masterservice" placeholder="Enter Master Service" oninput="this.className = ''"></p>
                                      </div>

                                      <div class="tab"><h3>Sub Service:</h3>
                                          <p><input name="subservice" placeholder="Enter Sub Service" oninput="this.className = ''"></p>
                                          <p><input name="subserviceprice" placeholder="Enter Sub Service Price" oninput="this.className = ''"></p>
                                      </div>

                                      <div class="tab subservice_field"><h3>Sub Sub Service:</h3>
                                          <p><input name="subsubservice[]" placeholder="Enter Sub-Sub Service" oninput="this.className = ''"></p>
                                          <p></p>
                                          <div class="subbig">
                                            <button type="button" class="add_subsubservice">Add More Sub Service</button>
                                          </div>
                                      </div>

                                      <div style="overflow:auto;">
                                          <div style="float:right;">
                                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                            <button type="button" id="nextBtn" name="nextBtn" onclick="nextPrev(1)">Next</button>
                                        </div>
                                    </div>

                                    <!-- Circles which indicates the steps of the form: -->
                                    <div style="text-align:center;margin-top:40px;">
                                      <span class="step"></span>
                                      <span class="step"></span>
                                      <span class="step"></span>
                                      <span class="step"></span>
                                  </div>
                                  <button type="submit" name="done">Done</button> 
                                </form>

                            </div>
                            <div class="clr"></div>
                           <!--  <div class="subbig">
                            	<button type="button" class="add_subservice">Add More Sub Service</button>
                            	
                            </div>
                            <div class="leagel-btn">
                            	<input type="button" id="done" value="Done" name="addservice" class="btn btn-primary">
                            </div> -->
                            <?php
                                include '../api/service/addnewservice.php';
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
            <script src="../js/multiplestepform.js"></script>
            <script src="../js/addnewservice.js"></script>

</body>
</body>
</html>