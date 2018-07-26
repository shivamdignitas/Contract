<div class="row heading">
    <div class="col-sm-9">
        <div class="logo">
            <a href="#">
                <img src="<?php if(isset($_SESSION['logged_in'])) { echo '../'; } ?>images/logo.png" />
            </a>
        </div>
    </div>
    <?php if(isset($_SESSION['logged_in'])) { ?>
        <div class="col-sm-3">
            <div class="upbtn">
                <a id="link_0" href="upload.php" class="btn btn-primary align-middle" role="button" aria-pressed="true">Upload Contract</a>
                <?php if (strpos($_SERVER['REQUEST_URI'], "user/index") === false) { ?>
                    <a id="link_1" href="index.php" class="btn btn-primary viewal" role="button" aria-pressed="true">View All</a>
                <?php } else { ?>
                    <a id="link_1" href="create.php" class="btn btn-primary viewal" role="button" aria-pressed="true">Create New</a>
                <?php } ?>
                <a id="link_logout" href="../index.php" class="btn btn-primary align-middle" role="button" aria-pressed="true">Logout</a>
             </div>   
        </div> 
    <?php } ?>
</div