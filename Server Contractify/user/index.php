<?php
	include '../api/common/common.php';

	session_start();
	if(empty($_SESSION) || !isset($_SESSION['logged_in']) || ($_SESSION['logged_in']!=true) || ($_SESSION['type']!=1)) {
		header("Location: ".$host_url."index.php");
		die();
	}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Contractify</title>
    <?php include '../includes/user-header-path.php';?>

</head>

<body id="index">

    <div class="container-fluid">
        <?php include "../includes/nav.php"; ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 nopad">
                <div id="table_div"></div>
            </div>
        </div>
    </div>     
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="../js/common.js"></script>
    <script src="../js/app1.js"></script>
    

</body>
</html>
