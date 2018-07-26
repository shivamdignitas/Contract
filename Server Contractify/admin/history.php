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
                <!-- <div class="row">
                </div> -->
                
                    <div class="row">
                        <div class="col-sm-12 nopad">
                            <div id="table_div"></div>
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
 	<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="../assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="../assets/js/paper-dashboard.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/common.js"></script>
    <script src="../js/history.js"></script>

</html>
