<?php
    include '../api/common/common.php';

    session_start();
    if(empty($_SESSION) || !isset($_SESSION['logged_in']) || ($_SESSION['logged_in']!=true) || ($_SESSION['type']!=0)) {
        header("Location: ".$host_url."index.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


<?php include '../includes/admin-header-path.php';?>
<style type="text/css">
    .grid_tableCell{
        width: 16.6%;
        text-align: center;
    }
    .grid_headerCell{
        text-align: center;
        color:white;
        background-color: #37123C;
        height: 50px;
    }
</style>
</head>
<body>
  <div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
<!-- Sidebar start -->
       <?php include 'sidebar.php';?>
<!-- Sidebar end -->
    </div>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-files"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Company</p>
                                            <span id = "com"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-files"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total Contracts</p>
                                            <span id = "con"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Total clients</p>
                                            <span id = "cli"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Master Services</p>
                                            <span id = "mas"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
              <form id="view_contract" >
            <div class="container-fluid">
            <div class="row">
                <div class="row sub-heading">
                <div class="col-sm-12">
                    <h2>
                      <?php
                        include '../api/common/db.php';
                        $id = $_GET['id'];
                        //echo $id;

                        //echo $id;
                        $sql = "SELECT company_name FROM dd_company WHERE company_id = '".$id."'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo $row['company_name'];

                        /*while($row = mysqli_fetch_array($result)){
                        echo '<option value="'.$row["id"].'">'.$row["service_name"].'</option>';
                        } */
                      ?>
                    </h2>
                </div>
                
            </div>
                <div class="col-sm-12 text-center">
                    <div class="form-sec entclint">

                      <div class="chosbox">
                                <p>Choose from Existing Client: </p>

                                <select id="existing_client_list" class="nav nav-pills">
                                </select>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </form>
          
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-9">
                    <h2>Contracts</h2>
                    </div>
                     <div class="col-sm-3 text-right">
                        <a class="btn btn-primary" href="create.php?id=<?php
                        include '../api/common/db.php';
                        $id = $_GET['id'];
                       
                        echo $id;

                        /*while($row = mysqli_fetch_array($result)){
                        echo '<option value="'.$row["id"].'">'.$row["service_name"].'</option>';
                        } */
                      ?>">Add New Contract</a>
                    <!--<input type="button" id="submit" value="Add New Contract" />-->
                    </div>
                    
                        <div class="col-sm-12 nopad">
                           
                            <div id="table_div"></div>
                        </div>
                    </div>
                </div>     
                
                </div>
            </div>
    


        <footer class="footer">
           <!-- footer start -->
       <?php include 'footer.php';?>
<!-- footer end -->
        </footer>

    </div>
  </div>

</body>
 <!--   Core JS Files   -->
    <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="../assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="../assets/js/paper-dashboard.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/common.js"></script>
    <script src="../js/stats.js"></script>
    <!--<script src="../js/display.js"></script>-->
    <script src="../js/app_create.js"></script>
    <script src="../js/viewcompany.js"></script>
    <script src="../js/fetch.js"></script>
    <!--<script src="../js/app.js"></script>-->
</html>