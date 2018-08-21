<?php
//include 'api/common/common.php';
if (isset($_POST["resetSubmit"])){
    $connection = new mysqli("localhost", "root", "", "ccsqadig_testdb");
    $email=($_POST['email']);
    $password=($_POST['password']);
    $confirm_password=($_POST['confirm_password']);
    $password = md5($password);
    $confirm_password = md5($confirm_password);
    if($password==$confirm_password){
        $connection->query("UPDATE `dd_login` SET `password`='".$password."', token='' WHERE username='".$email."'");
        echo "password successfully updated";
    }
    else{
        echo "password does not matches";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
     crossorigin="anonymous">
    <link href="css/style_user.css" rel="stylesheet" type="text/css" />
</head>
    <body style="background-color: #f0f0f0">
        <?php include "includes/nav.php"; ?>
        <div class="container-fluid">
            <div class="log">
            <h2>Reset Password</h2>
        </div>
        <form id ="Login" action="reset.php" method="post">
            <div class="login-box">
            <!--<input type="text" name="email" placeholder="Email"><br>-->
            <div class="col-sm-12">
            <input type="hidden" name="email" value="<?php echo $_REQUEST['email']; ?>"/>
            </div>
            <div class="col-sm-12">
            <input type="password" name="password" placeholder="PASSWORD" required=""><br><br>
            </div>
            <div class="col-sm-12">
            <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required=""><br><br>
            </div>
            <div class="col-sm-12">
            <input type="submit" name="resetSubmit" value="Reset Password">
            <a href="index.php">Login</a>
            </div>
        </div>
        </form>
        </div>
    </body>
</html>