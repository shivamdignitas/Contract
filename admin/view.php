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
                    <a href="dashboard.php"><img src="../images/logo.png" /></a>
                </div>
            </div>
            <div class="col-sm-2 ">
                <a id="link_1" href="display.php" class="btn btn-primary pull-right" role="button" aria-pressed="true">Back</a>
            </div>
        </div>
    </div>

    <div id ="content">
    	<?php
    	     include '../api/common/db.php';

    	     $sql = "SELECT * FROM dd_static_contract";
    	     $result = mysqli_query($conn, $sql);
    	     while($row = mysqli_fetch_array($result)){
                echo "<div id='img_div'>";
                echo "<img src='images/".$row['contract']."' >";
                echo "<p>".$row['text']."</p>";
                echo "</div>";
            } 
    	?>
    </div>
	</body>
</html>