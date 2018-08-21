<?php
//include 'api/common/common.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

    if (isset($_POST["forgotPass"])) {
        $connection = new mysqli("localhost", "root", "", "ccsqadig_testdb");
        
        //$email = $connection->real_escape_string($_POST["email"]);
        $email = stripslashes($_POST["email"]); 
        $email = mysqli_real_escape_string($connection,$_POST["email"]);
        
        //$data = $connection->query("SELECT id FROM dd_login WHERE username='".$email."'");
        $query = "SELECT id FROM dd_login WHERE username='".$email."'";
        $data = mysqli_query($connection,$query);

        if ($data->num_rows > 0) {
            $str = "0123456789qwertzuioplkjhgfdsayxcvbnm";
            $str = str_shuffle($str);
            $str = substr($str, 0, 10);
            //echo $str;
            //$url = "http://localhost/contract/resetPassword.php?token='".$str."'&email='".$email."'";
            //echo $url;
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sk666737@gmail.com';                 // SMTP username
                $mail->Password = '9560403513';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('sk666737@gmail.com', 'Mailer');
                $mail->addAddress($email);     // Add a recipient
                //$mail->addAddress('ellen@example.com');               // Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = "
                Hi,<br><br>
                
                In order to reset your password, please click on the link below:<br>
                <a href='
                http://localhost/contract/resetpassword.php?email=".$email."&token=".$str."
                '>http://localhost/contract/resetpassword.php?email=".$email."&token=".$str."</a><br><br>
                
                Kind Regards,<br>
                Dignitas Digital
                ";
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $query = "UPDATE dd_login SET token='".$str."' WHERE username='".$email."'";
                $result = mysqli_query($connection,$query);
                echo 'Link has been sent';
                echo "Please check your email!";
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }

            //mail($email, "Reset password", "To reset your password, please visit this: $url", "From: myanotheremail@domain.com\r\n");

            //$connection->query("UPDATE dd_login SET token='$str', expire = DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE username='$email'");
            

            
        } else {
            echo "Please check your inputs!";
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
            <h2>Forgot Password</h2>
        </div>
        <form id ="Login" action="forgotpassword.php" method="post">
            <div class="login-box">
            <div class="col-sm-12">
            <input type="text" name="email" placeholder="Email">
            </div>
            <div class="col-sm-12">
            <input type="submit" name="forgotPass" value="Continue">
            <p>or <a href="index.php">Login</a></p>
            </div>
            <div class="clr"></div>
            </div>
        </form>
    </div>
    </body>
</html>