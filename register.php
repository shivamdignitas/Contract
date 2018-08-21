    <?php
    include 'api/common/common.php';

    
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
            <h2>Register</h2>
        </div>
        <form id = "register" method="POST">
  <div class="login-box">
    <!--<h1>Register</h1>-->
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="lname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" required>

    <label for="lname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <hr>

    <input type="submit" id="submit" value="Register" />
    <div class="container signin">
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>
  </div>
  
  
</form>

        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Include our app.js file, this will contain the logic on frontend -->
    <script src="js/common.js"></script>
    <script src="js/register.js"></script>

</body>

</html>